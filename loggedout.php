<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start();
session_destroy();
setcookie('username',time()-3600);
setcookie('password',time()-3600);
setcookie('type',time()-3000);
header("Location:index.php");
?>