<?php
require_once '../langs/lang_driver.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';
header('Content-Type: application/json');
$emptyMsg = item("main", "emptyMsg");
$cooldownError = item("main", "cooldownError");
$posted = item("main", "topicPosted");
$nextPost = time() + 2 * 60;
if ($_SESSION['postcooldown'] < time()) {
    $userID = $_SESSION['user_id'];
    $time = time();
    $title = str_replace('<', '&lt;', $_POST['topic_title']);;
    $text = str_replace('<', '&lt;', $_POST['topic_post']);;
    $lang = $_POST['community'];
    $points = 0;
    $votes = 0;
    if (empty($_POST['topic_title']) || empty($_POST['topic_post'])) {
        echo json_encode([
            "success" => false,
            "message" => $emptyMsg
        ]);
        exit();
    } elseif (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text) || preg_match("(^https?)", $text) || preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$title) || preg_match("(^https?)", $title)) {
        echo json_encode([
            "success" => false,
            "message" => "Links are not allowed."
        ]);
        exit();
    } else {
        $sql = "INSERT INTO cafetopics (Title, AuthorID, Langue) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'sis', $title, $userID, $lang);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_query($con, $sql);
        $topicID = mysqli_insert_id($con);
        $sqlPost = "INSERT INTO cafeposts (TopicID, AuthorID, Post, Date, Points, Votes) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtPost = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmtPost, $sqlPost);
        mysqli_stmt_bind_param($stmtPost, 'iisiii', $topicID, $userID, $text, $time, $points, $votes);
        mysqli_stmt_execute($stmtPost);
        mysqli_stmt_store_result($stmtPost);
//        $_SESSION['postcooldown'] = $nextPost;
        echo json_encode([
            "success" => true,
            "message" => $posted,
            "id" => $topicID
        ]);
        exit();
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => $cooldownError
    ]);
    exit();
}