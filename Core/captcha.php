<?php
session_start();

header("Content-Type: image/png");

$backgroundImage = imagecreatefrompng("../assets/captcha/captcha_bg.png"); 

$textColor = imagecolorallocate($backgroundImage, 20, 20, 20);

$font = __DIR__ . "/../assets/captcha/GreatVibes-Regular.ttf";

$text = bin2hex(random_bytes(3));

$_SESSION["captchaText"] = $text;

imagettftext($backgroundImage, 60, 0, 110, 90, $textColor, $font, $text);

imagepng($backgroundImage);

imagedestroy($captchaImage);

?>