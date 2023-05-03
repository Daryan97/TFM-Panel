<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconfig.inc.php';

if (empty($_SESSION['user_id'])) {
    header('location: /login.php');
} else {
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE PlayerID = ?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            if ($row['PlayerID'] == $id) {
                $username = $row['Username'];
                $privLevel = $row['PrivLevel'];
                $mapcrew = $row['MapCrew'];
                $funcorp = $row['FunCorp'];
                $luadev = $row['LuaDev'];
                if ($privLevel == 10) {
                    $privIcon = '<span class="badge badge-danger">Admin</span>';
                } elseif ($privLevel == 9) {
                    $privIcon = '<span class="badge badge-light">Admin</span>';
                } elseif ($privLevel == 5) {
                    $privIcon = '<span class="badge badge-dark">Mod</span>';
                } elseif ($privLevel == 3) {
                    $privIcon = '<span class="badge badge-info">Helper</span>';
                } elseif ($mapcrew == 1) {
                    $privIcon = '<span class="badge badge-primary">MapCrew</span>';
                } elseif ($funcorp == 1) {
                    $privIcon = '<span class="badge badge-secondary">FunCorp</span>';
                } elseif ($luadev == 1) {
                    $privIcon = '<span class="badge badge-info">LuaDEV</span>';
                } else {
                    $privIcon = '<span class="badge badge-gray">Player</span>';
                }
                $vipTime = $row['VipTime'];
                if ($vipTime == 0) {
                    $vip = '-';
                } else {
                    $vip = gmdate("m/d/Y", $vipTime);
                }
                $email = $row['Email'];
                $tag = $row['NameID'];
                $tag = str_pad($tag, 4, '0', STR_PAD_LEFT);
                $fullname = $username . '#' . $tag;
                $playerLook = $row['Look'];
                $cheeseCount = $row['CheeseCount']; // 1
                $firstCount = $row['FirstCount']; // 2
                $bootcampCount = $row['BootcampCount']; // 3
                $easyMode = $row['ShamanSaves'];
                $hardMode = $row['HardModeSaves'];
                $divineMode = $row['DivineModeSaves'];
                $shamanCheese = $row['ShamanCheeses']; // 4
                $shopCheeses = $row['ShopCheeses'];
                $shopFraises = $row['ShopFraises'];
                $shamanLevel = $row['ShamanLevel'];
                $shamanExp = $row['ShamanExp'];
                $shamanExpNeeded = $row['ShamanExpNext'];
                $regDate = $row['RegDate'];
                $timePlayed = $row['Time'];
                $hours = floor($timePlayed / 3600);
                $minutes = floor(($timePlayed / 60) % 60);
                $seconds = $timePlayed % 60;
                $expPercent = (1 - $shamanExp / $shamanExpNeeded) * 100;
                $expPercent = abs($expPercent);
                list($racingRounds, $racingCompleted, $racingPodiums, $racingFirsts) = explode(',', $row['RacingStats']);
                list($survivorRounds, $survivorShaman, $survivorKills, $SurvivedRounds) = explode(',', $row['SurvivorStats']);
                $genderType = $row['Gender'];
                if ($genderType === 1) {
                    $gender = '<font color="#ff75ab">Female</font>';
                } elseif ($genderType === 2) {
                    $gender = '<font color="#2481ff">Male</font>';
                } else {
                    $gender = '-';
                }
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/avatars/' . $id . '/' . $id . '.jpg')) {
                    $srcImage = "/avatars/$id/$id.jpg";
                    $filemtime = time();
                    $image = $srcImage . '?' . $filemtime;
                } else {
                    $filemtime = time();
                    $image = "/images/placeholder.png?$filemtime";
                }
            }
        }
    }
}
?>

<?php
function hide_email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        list($first, $last) = explode('@', $email);
        $first = str_replace(substr($first, '2'), str_repeat('*', strlen($first) - 2), $first);
        $last = explode('.', $last);
        $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0']) - 1), $last['0']);
        $hide_email = $first . '@' . $last_domain . '.' . $last['1'];
        return $hide_email;
    }
}

function lockSession($type)
{
    $_SESSION['locked'] = $type;
}
if (isset($_GET['lock'])) {
    lockSession($_GET['lock']);
}
?>