<?php
session_start();
session_unset();
session_destroy();
setcookie('user_id', '', time()-7000000, '/');
header("location: ../login.php");
