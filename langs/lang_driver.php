<?php
session_start();
if (!isset($_SESSION['SYS_LANG'])) {
    setlang('en');
} else {
    setlang($_SESSION['SYS_LANG']);
}

function setlang($lang)
{
    $_SESSION['SYS_LANG'] = strtolower($lang);
    if (!defined('SYS_LANG')) define("SYS_LANG", strtolower($lang));
    return SYS_LANG;
}

function getlang()
{
    return SYS_LANG;
}

function item($section, $name)
{
    return json_decode(file_get_contents(__DIR__ . '/' . SYS_LANG . '.json'), true)[$section][$name];
}

?>
