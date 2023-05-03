<?php
require $_SERVER['DOCUMENT_ROOT'].'/includes/dbconfig.inc.php';
$sql = $con->query("SELECT * FROM users WHERE PrivLevel >= 3 OR MapCrew = 1 ORDER BY PrivLevel DESC;");

function staffCount($con)
{
    $sql = "SELECT COUNT(Username) FROM users WHERE PrivLevel >= 3 OR MapCrew = 1;";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
}