<?php
$w = 55;
$h = 20;
$str = array();


$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  #0123456789
for($i=0; $i<4; $i++){
  $str[$i] = $string[rand(0,25)];
  $code .=$str[$i];
}

if(!isset($_SESSION)) session_start();
$_SESSION['validate'] = $code;



$im = imagecreatetruecolor($w,$h);
$white = imagecolorallocate($im,255,255,255);
$black = imagecolorallocate($im,0,0,0);
imagefilledrectangle($im,0,0,$w,$h,$white);
imagerectangle($im,0,0,$w-1,$h-1,$black);


for($i=1; $i<200; $i++){
$x = mt_rand(1,$w-9);
$y = mt_rand(1,$h-9);
$color = imagecolorallocate($im,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
imagechar($im,1,$x,$y,"*",$color);
}


for($i=0; $i<count($str); $i++){
$x = 12 + $i *($w-13)/4;
$y = mt_rand(3,$h/3);
$color = imagecolorallocate($im,mt_rand(0,255),mt_rand(1,155),mt_rand(125,255));
imagechar($im,5,$x,$y,$str[$i],$color);
}
header("content-Type: text/html; charset=utf-8");
header("Content-type:image/jpeg");
imagejpeg($im);
imagedestroy($im);
?>