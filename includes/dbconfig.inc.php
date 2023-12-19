<?php
$servername = $_SERVER['MYSQL_HOST'];
$dbusername = $_SERVER['MYSQL_USER'];
$dbpassword = $_SERVER['MYSQL_PASS'];
$dbname = $_SERVER['MYSQL_DB'];

$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());exit();
}
