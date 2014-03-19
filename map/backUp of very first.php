<?php
/*
$dest = imagecreatefromjpeg('1.jpg');
//$src = imagecreatefrompng('2.png');
//imagealphablending($dest, false);
//imagesavealpha($dest, true);
//bool imagecopymerge ($dst_im,$src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct )
//imagecopymerge($dest, $src, 100, 50, 50, 50, 581, 380, 100);
//imageline ($dest, 100, 100, 100, 100, 2 );
$red = ImageColorAllocate($dest, 255, 0, 0);
//imagestring($dest, 6, 5, 5,  "A Simple Text String", $text_color);
ImageLine($dest, 6,65,196,547,$red);
header('Content-Type: image/png');
imagepng($dest);
imagedestroy($dest);
//imagedestroy($src);
*/
?>
<?php
function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick)
{
    if ($thick == 1) {
        return imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
    $a = $t / sqrt(1 + pow($k, 2));
    $points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($image, $points, 4, $color);
    return imagepolygon($image, $points, 4, $color);
}
function arrow($image, $x1, $y1, $x2, $y2, $alength, $awidth, $color) {
    if( $alength > 1 )
        arrow( $image, $x1, $y1, $x2, $y2, $alength - 1, $awidth - 1, $color );
    $distance = sqrt(pow($x1 - $x2, 2) + pow($y1 - $y2, 2));
    $dx = $x2 + ($x1 - $x2) * $alength / $distance;
    $dy = $y2 + ($y1 - $y2) * $alength / $distance;
    $k = $awidth / $alength;
    $x2o = $x2 - $dx;
    $y2o = $dy - $y2;
    $x3 = $y2o * $k + $dx;
    $y3 = $x2o * $k + $dy;
    $x4 = $dx - $y2o * $k;
    $y4 = $dy - $x2o * $k;
    imageline($image, $x1, $y1, $dx, $dy, $color);
    imageline($image, $x3, $y3, $x4, $y4, $color);
    imageline($image, $x3, $y3, $x2, $y2, $color);
    imageline($image, $x2, $y2, $x4, $y4, $color);
}

$img = imagecreatefromjpeg('1.jpg');

$red = ImageColorAllocate($img, 255, 0, 0);
$black = ImageColorAllocate($img, 0, 0, 0);
$white = ImageColorAllocate($img, 255, 255, 255);
$blue = ImageColorAllocate($img, 0, 0, 255);
$green = ImageColorAllocate($img, 0, 255, 0);

$p0=array(190, 100, 40, 40, $red);
$p1=array(200,  210, 40, 40, $black);
$p2=array(370,  320, 40, 40, $white);
$p3=array(410,  430, 40, 40, $blue);
$p4=array(550,  540, 40, 40, $green);
$p5=array(640,  750, 40, 40, $red);
$p6=array(730,  960, 40, 40, $white);
$p7=array(820,  870, 40, 40, $blue);
$p8=array(910,  980, 40, 40, $green);
$p9=array(1000, 1000, 40, 40, $black);
$p10=array(1900, 1500, 40, 40, $red);
$p11=array(1900, 1500, 40, 40, $red);
$p=array($p0,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11);
//image	-	x1 - y1 - x2 - y2
//Imagelinethick($img, 0,0,2100,1765,$red, 5);


for($i=0;$i<=10;$i++)
{
	if($i==0)
		Imagettftext($img, 30, 0, $p[$i][0]+25, $p[$i][1]+25, $black, 'arial.ttf', '1. Way to Castle');
	if($i==10)
		Imagettftext($img, 30, 0, $p[$i][0]-325, $p[$i][1]-5, $black, 'arial.ttf', '10. Destination');
	ImageFilledEllipse($img, $p[$i][0], $p[$i][1], $p[$i][2], $p[$i][3], $p[$i][4]);
	Imagelinethick($img, $p[$i][0], $p[$i][1], $p[$i+1][0], $p[$i+1][1], $p[$i][4], 8);
}

/*
imagettftext($img, 30, 0, $p1[0]+25, $p1[1]+25, $black, 'arial.ttf','2. Door no. 2');
ImageFilledEllipse($img, $p1[0], $p1[1], $p1[2], $p1[3], $red);
Imagelinethick($img, $p1[0], $p1[1], $p2[0], $p2[1], $black, 8);

ImageFilledEllipse($img, $p2[0], $p2[1], $p2[2], $p2[3], $red);
Imagelinethick($img, $p2[0], $p2[1], $p3[0], $p3[1], $white, 8);

ImageFilledEllipse($img, $p3[0], $p3[1], $p3[2], $p3[3], $red);
Imagelinethick($img, $p3[0], $p3[1], $p4[0], $p4[1], $blue, 8);

ImageFilledEllipse($img, $p4[0], $p4[1], $p4[2], $p4[3], $red);
Imagelinethick($img, $p4[0], $p4[1], $p5[0], $p5[1], $green, 8);

ImageFilledEllipse($img, $p5[0], $p5[1], $p5[2], $p5[3], $red);
Imagelinethick($img, $p5[0], $p5[1], $p6[0], $p6[1], $red, 8);

ImageFilledEllipse($img, $p6[0], $p6[1], $p6[2], $p6[3], $red);
Imagelinethick($img, $p6[0], $p6[1], $p7[0], $p7[1], $black, 8);

ImageFilledEllipse($img, $p7[0], $p7[1], $p7[2], $p7[3], $red);
Imagelinethick($img, $p7[0], $p7[1], $p8[0], $p8[1], $white, 8);

ImageFilledEllipse($img, $p8[0], $p8[1], $p8[2], $p8[3], $red);
Imagelinethick($img, $p8[0], $p8[1], $p9[0], $p9[1], $blue, 8);

ImageFilledEllipse($img, $p9[0], $p9[1], $p9[2], $p9[3], $red);
Imagelinethick($img, $p9[0], $p9[1], 2100, 1765, $green, 8);
*/

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
?>
