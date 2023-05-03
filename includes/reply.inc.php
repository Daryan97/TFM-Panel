<?php
require_once '../langs/lang_driver.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';
header('Content-Type: application/json');
$errorOccured = item("main", "errorOccured");
$emptyMsg = item("main", "emptyMsg");
$cooldownError = item("main", "cooldownError");
if ($_SESSION['postcooldown'] < time()) {
    $userID = $_SESSION['user_id'];
    $time = time();
    $msg = str_replace('<', '&lt;', $_POST['reply_msg']);;
    $topicID = $_POST['topic_id'];
    $points = 0;
    $votes = 0;
    $nextPost = time() + 2 * 60;
    $sqlUser = "SELECT Username, NameID FROM users WHERE PlayerID = ?";
    $date = gmdate("m/d/Y", $time);
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sqlUser)) {
        echo json_encode([
            "success" => false,
            "message" => $errorOccured
        ]);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $username = $row['Username'];
            $tag = $row['NameID'];
            $tag = str_pad($tag, 4, '0', STR_PAD_LEFT);
            $fullname = $username . '#' . $tag;
        }
    }
    if (empty($topicID) || empty($userID) || empty($msg)) {
        echo json_encode([
            "success" => false,
            "message" => $emptyMsg
        ]);
        exit();
    } elseif (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$msg) || preg_match("(^https?)", $msg)) {
        echo json_encode([
            "success" => false,
            "message" => "Links are not allowed."
        ]);
        exit();
    } else {
        $sql = "INSERT INTO cafeposts (TopicID, AuthorID, Post, Date, Points, Votes) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'iisiii', $topicID, $userID, $msg, $time, $points, $votes);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
//            $_SESSION['postcooldown'] = $nextPost;
            echo json_encode([
                "success" => true,
                "message" => $msg,
                "username" => $fullname,
                "timestamp" => $date,
                "avatar" => "/avatars/$userID/$userID.jpg?$time",
            ]);
            exit();
        }
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => $cooldownError
    ]);
    exit();
}