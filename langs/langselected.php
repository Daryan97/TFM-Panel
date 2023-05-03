<?php
$english = '';
$spanish = '';
if ($_SESSION['SYS_LANG'] == 'en') {
    $english = 'active';
} elseif ($_SESSION['SYS_LANG'] == 'es') {
    $spanish = 'active';
}