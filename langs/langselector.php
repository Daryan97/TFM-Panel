<?php
$url = explode('?', $_SERVER['REQUEST_URI']);


if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'es') {
        setlang('es');
        header("Refresh:0; url=$url[0]");
    } else {
        setlang('en');
        header("Refresh:0; url=$url[0]");
    }
}