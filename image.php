<?php
/*
header("Content-type: image/png");
$string = $_COOKIE['ques'];
$font  = 45;
$width  = imagefontwidth($font) * strlen($string);
$height = imagefontheight($font);
$image = imagecreatetruecolor ($width,$height);
$white = imagecolorallocate ($image,255,255,255);
$black = imagecolorallocate ($image,0,0,0);
imagefill($image,0,0,$white);
imagestring ($image,$font,0,0,$string,$black);
imagepng ($image);
imagedestroy($image);
*/

header('Content-type: image/png');
$im = imagecreatetruecolor(500, 50);
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $grey);
$text = $_COOKIE['ques'];
$font = 'font.ttf';
imagettftext($im, 15, 0, 35, 35, $white, $font, $text);
imagepng($im);
imagedestroy($im);

?>