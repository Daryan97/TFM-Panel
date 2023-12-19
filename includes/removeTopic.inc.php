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
    
    // Prepare the DELETE query for cafetopics table
    $sql = "DELETE FROM cafetopics WHERE TopicID IN (";
    $params = array();
    foreach ($deleteList as $key => $value) {
        $sql .= "?,";
        $params[] = $value;
    }
    $sql = rtrim($sql, ',') . ")";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
    mysqli_stmt_execute($stmt);
    
    // Prepare the DELETE query for cafeposts table
    $sqlposts = "DELETE FROM cafeposts WHERE TopicID IN (";
    $paramsPosts = array();
    foreach ($deleteList as $key => $value) {
        $sqlposts .= "?,";
        $paramsPosts[] = $value;
    }
    $sqlposts = rtrim($sqlposts, ',') . ")";
    $stmtPosts = mysqli_prepare($con, $sqlposts);
    mysqli_stmt_bind_param($stmtPosts, str_repeat('s', count($paramsPosts)), ...$paramsPosts);
    mysqli_stmt_execute($stmtPosts);

    header('location: /cafe/topics.php');
} else {
    echo json_encode([
        "success" => false,
        "message" => 'Something went wrong...',
    ]);
    exit();
}