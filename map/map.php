<?php
function decrypt_css($encrypted)
{
    $key = 'shekharsingh';
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;
}

function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick)
{
    if ($thick == 1)
        return imageline($image, $x1, $y1, $x2, $y2, $color);
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2)
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
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
function join_css($img, $a1, $a2)
{
	$red = ImageColorAllocate($img, 255, 0, 0);
	Imagelinethick($img, $a1[0], $a1[1], $a2[0], $a2[1], $red, 3);
}

$img = imagecreatefromjpeg('1.jpg');
$color = ImageColorAllocate($img, 0, 0, 0);//black
$white = ImageColorAllocate($img, 255, 255, 255);
$blue = ImageColorAllocate($img, 0, 0, 255);
$red = ImageColorAllocate($img, 255, 0, 0);
//(0,0,330,443)
//476,614




//$p1=array(x_start, y_start, 13, 13, $color,1);//1
$p1=array(211, 580, 13, 13, $color,1);//1
$p2=array(120, 525, 10, 10, $color,2);//2
$p3=array(276, 529, 10, 10, $color,3);//3

$p22=array(250, 559, 10, 10, $color,22);//23
$p23=array(307, 529, 10, 10, $color,23);//22

$p4=array(96, 448, 10, 10, $color,4);//4
$p5=array(63, 375, 10, 10, $color,5);//5
$p6=array(63, 306, 10, 10, $color,6);//6
$p7=array(125, 345, 10, 10, $color,7);//7

//checkpoint 1
$p8=array(222, 358, 18, 18, $red,8);//8

$p9=array(203, 529, 10, 10, $color,9);//9
$p10=array(250, 475, 10, 10, $color,10);//10
$p11=array(250, 443, 10, 10, $color,11);//11
$p12=array(222, 443, 10, 10, $color,12);//12
$p13=array(222, 396, 10, 10, $color,13);//13


$p14=array(345, 552, 10, 10, $color,14);//14
$p15=array(345, 499, 10, 10, $color,15);//15
$p16=array(414, 516, 10, 10, $color,16);//16
$p17=array(406, 461, 10, 10, $color,17);//17
$p18=array(370, 430, 10, 10, $color,18);//18
$p19=array(370, 368, 10, 10, $color,19);//19
$p20=array(370, 325, 10, 10, $color,20);//20
$p21=array(300, 360, 10, 10, $color,21);//21
//$p22=array(160, 65, 18, 18, $red,22);//22



$p=array($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18,$p19,$p20,$p21,$p22,$p23);

//$qid=$_GET['qid'];
$qid = decrypt_css($_COOKIE['_c_q__']);
//i am changing
switch ($qid) {
    case '1':
        $qid='1';
        break;
    case '1#1':
        $qid='2';
        break;
    case '1#2':
        $qid='4';
        break;
    case '1#3':
        $qid='5';
        break;        
    case '1#4':
        $qid='6';
        break;
    case '1#5':
        $qid='7';
        break;
    case '1#6':
        $qid='8';
        break;
    case '2#1':
        $qid='22';
        break;
    case '2':
        $qid='1';
        break;    
    case '2#2':
        $qid='3';
        break;
    case '2#3':
        $qid='9';
        break;
    case '2#4':
        $qid='10';
        break;
    case '2#5':
        $qid='11';
        break;    
    case '2#6':
        $qid='12';
        break;
    case '2#7':
        $qid='8';
        break;
    case '3':
        $qid='14';
        break;
    case '3#1':
        $qid='23'; //change karna hai
        break;
    case '3#2':
        $qid='14';
        break;
    case '3#3':
        $qid='18';
        break;
    case '3#4':
        $qid='19';
        break;
    case '3#5':
        $qid='20';
        break;
    case '3#6':
        $qid='21';
        break;    
    case '3#7':
        $qid='8';
        break;
    case '4#1':
        $qid='16';
        break;
    case '4#2':
        $qid='17';
        break;
    case '4#3':
        $qid='18';
        break;
    case '4#4':
        $qid='19';
        break;
    case '4#5':
        $qid='20';
        break;
    case '4#6':
        $qid='21';
        break;    
    case '4#7':
        $qid='8';
        break;    
    default:
        $qid='1';
        break;
}



$w=0;
while($p[$w][5]!=$qid)
	$w++;	//final $w will be the current index of current question in $p[]

join_css($img, $p1, $p2);
join_css($img, $p2, $p4);
join_css($img, $p4, $p5);
join_css($img, $p5, $p6);
join_css($img, $p6, $p7);
join_css($img, $p7, $p8);

join_css($img, $p1, $p22);
join_css($img, $p22, $p3);
join_css($img, $p3, $p9);
join_css($img, $p9, $p10);
join_css($img, $p10, $p11);
join_css($img, $p11, $p12);
join_css($img, $p12, $p13);
join_css($img, $p13, $p8);

join_css($img, $p3, $p23);
join_css($img, $p23, $p14);
join_css($img, $p14, $p15);
join_css($img, $p15, $p18);
join_css($img, $p18, $p19);
join_css($img, $p19, $p20);
join_css($img, $p20, $p21);
join_css($img, $p21, $p8);

join_css($img, $p14, $p16);
join_css($img, $p16, $p17);
join_css($img, $p17, $p18);



/****
join_css($img, $p7, $p11);
join_css($img, $p13, $p17);
join_css($img, $p17, $p18);
join_css($img, $p18, $p19);
join_css($img, $p19, $p20);

join_css($img, $p13, $p14);
join_css($img, $p14, $p20);
***/

for($i=0;$i<=22;$i++)
{	
if($i == $w)
{	
	ImageFilledEllipse($img, $p[$i][0], $p[$i][1], 18, 18, $blue);
	Imagettftext($img, 15, 0, $p[$i][0]+10, $p[$i][1]+10, $color, 'arial.ttf', 'You are here.');
}
else
	ImageFilledEllipse($img, $p[$i][0], $p[$i][1], $p[$i][2], $p[$i][3], $p[$i][4]);

}
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
?>
