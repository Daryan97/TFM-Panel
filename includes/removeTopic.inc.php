<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/langs/lang_driver.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/userinfo.inc.php';

if (isset($_POST['deleteBtn']) && $privLevel >= 5) {
    $deleteList = array();
    foreach ($_POST['topicID'] as $key => $value) {
        $deleteList[] = $value;
    }
    $topicIDs = implode("','", $deleteList);
    $sql = "DELETE FROM cafetopics WHERE TopicID IN ('" . $topicIDs . "')";
    mysqli_multi_query($con, $sql);

    $sqlposts = "DELETE FROM cafeposts WHERE TopicID IN ('" . $topicIDs . "')";
    mysqli_multi_query($con, $sqlposts);

    header('location: /cafe/topics.php');
} else {
    echo json_encode([
        "success" => false,
        "message" => 'Something went wrong...',
    ]);
    exit();
}