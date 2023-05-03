<?php
require_once '../langs/lang_driver.php';
require_once '../includes/userinfo.inc.php';
$id = $_SESSION['user_id'];
$oldPass = $_POST['currentPassword'];
$newPass = $_POST['newPassword'];
$repPass = $_POST['repeatPassword'];
$verification = base64_encode(hash('sha256', hash('sha256', $oldPass) . "\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", TRUE));

require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';

$sql = mysqli_query($con, "SELECT Password FROM users WHERE PlayerID ='" . $id . "';");
while ($row = mysqli_fetch_array($sql)) {
    if ($verification == $row['Password'] && $newPass == $repPass && $id != 5) {
        $hash = base64_encode(hash('sha256', hash('sha256', $newPass) . "\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", TRUE));
        mysqli_query($con, "UPDATE users SET Password = '" . $hash . "' WHERE PlayerID='" . $id . "';");
        lockSession(2);
    } else {
        header("location: ../profile/details.php?password=failed");
    }
}
?>