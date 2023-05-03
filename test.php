<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';
$username = "Demo";
$email = "demo@example.com";
$password = "demo";
$passwordRepeat = "demo";
$tag = 0;
$consumables = '2256:5;23:10;2379:5;2252:5;2349:5;2253:6';
$equipedCon = '23';
$stats = '0,0,0,0';
$Level = 50;
$levelExpNext = 680;
$time = time();
$shamanColor = '95d9d6';
$mouseColor = '78583a';
$look = '1;0,0,0,0,0,0,0,0,0';
$shop = 50000;
$zeroNumber = 0;
$sql = "INSERT INTO users (Username, NameID, Password, PrivLevel, TitleNumber, FirstCount, CheeseCount, ShamanCheeses, ShopCheeses, ShopFraises, ShamanSaves, HardModeSaves, DivineModeSaves, BootcampCount, ShamanType, Look, MouseColor, ShamanColor, RegDate, TotemItemCount, BanHours, Email, MapCrew, LuaDev, Funcorp, ShamanLevel, ShamanExp, ShamanExpNext, LastOn, Gender, MarriageID, LastDivorceTimer, TribeCode, TribeRank, Karma, TribunalCorrect, TribunalIncorrect, ElectionVoted, SurvivorStats, RacingStats, EquipedShamanBadge, Consumables, EquipedConsumables, Pet, PetEnd, IceCoins, IceTokens, VipTime, Time, GodFather, RoundsCount, MuteTime, PermaBanned, BanTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
$hashedPwd = base64_encode(hash('sha256', hash('sha256', $password) . "\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", TRUE));
mysqli_stmt_bind_param($stmt, 'sisiiiiiiiiiiiisssiiisiiiiiiiiiiiiiiiississiiiiiiiiiii', $username, $tag, $hashedPwd, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $shop, $shop, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $look, $mouseColor, $shamanColor, $time, $zeroNumber, $zeroNumber, $email, $zeroNumber, $zeroNumber, $zeroNumber, $Level, $zeroNumber, $levelExpNext, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $stats, $stats, $zeroNumber, $consumables, $equipedCon, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber, $zeroNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

echo "done";
?>