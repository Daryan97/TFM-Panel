<?php
require_once '../langs/lang_driver.php';

if (isset($_POST['login-submit'])) {

    require 'dbconfig.inc.php';

    $useruid = $_POST['username'];
    if (strpos($useruid, '#') == false) {
        $name = $useruid;
        $tag = 0;
    } else {
        list($tag, $name) = explode('#', strrev($useruid), 2);
        $name = strrev($name);
        $tag = strrev($tag);
        if ($tag <= 9) {
            $tag = substr_replace($tag, "", 0, 3);
        } elseif ($tag <= 99 && $tag >= 10) {
            $tag = substr_replace($tag, "", 0, 2);
        } elseif ($tag <= 999 && $tag >= 100) {
            $tag = substr_replace($tag, "", 0, 1);
        } else {
            $tag = substr_replace($tag, "", 0, 0);
        }
    }

    $password = $_POST['password'];

    if (empty($useruid) || empty($password)) {
        header("location: ../login?error=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE Username = ? AND NameID = ?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login?error=0000E");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "si", $name, $tag);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row['PermaBanned'] == true) {
                    header("location: ../login?error=disabled");
                    exit();
                } else {
                    $verification = base64_encode(hash('sha256', hash('sha256', $password) . "\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", TRUE));
                    if ($verification === $row['Password']) {
                        $_SESSION['user_id'] = $row['PlayerID'];
                        if (!isset($_SESSION['postcooldown'])) {
                            $_SESSION['postcooldown'] = 0;
                        }
                        header('location: ../index.php');
                    } else {
                        header("location: ../login.php?error=wrongpwd");
                        exit();
                    }
                }
            } else {
                header("location: ../login.php?error=falseinfo");
                exit();
            }
        }
    }

} else {
    header("location: ../login.php");
    exit();
}
