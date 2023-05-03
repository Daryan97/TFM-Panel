<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "transformice";

$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());exit();
}
