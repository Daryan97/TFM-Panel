<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';
$tcsql = "SELECT * FROM cafetopics WHERE TopicID = ?;";
$tcstmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($tcstmt, $tcsql);
mysqli_stmt_bind_param($tcstmt, "i", $_GET['id']);
mysqli_stmt_execute($tcstmt);
$tcres = mysqli_stmt_get_result($tcstmt);
$tc = mysqli_fetch_assoc($tcres);
$topicID = $tc['TopicID'];
$topicTitle = $tc['Title'];
$topicID = $_GET['id'];