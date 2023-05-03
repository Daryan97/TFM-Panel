<?php
require_once '../langs/lang_driver.php';
require 'dbconfig.inc.php';

if (isset($_POST['unlock'])) {
    $id = $_SESSION['user_id'];
    $password = $_POST['password'];
    $sql = "SELECT Password FROM users WHERE PlayerID = ?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=databaseError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $hash = base64_encode(hash('sha256', hash('sha256', $password) . "\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", TRUE));
            if ($hash == $row['Password']) {
                unset($_SESSION['locked']);
                header('location: ../index.php');
            } else {
                header('location: ../locked.php?error=wrongpwd');
            }
        }
    }
} else {
    header('location: ../locked.php');
}