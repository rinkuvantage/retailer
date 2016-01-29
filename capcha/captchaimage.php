<?php @session_start();
require_once("captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
echo $_SESSION['captcha']['image_src'];