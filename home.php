<?php

date_default_timezone_set('Asia/Bangkok');

    $y = str_pad($x[1], 4, "0", STR_PAD_RIGHT);
    $MY_SESSION = date("YmdHis") . $y;
    $EXE_CMD = "/usr/local/stata14/stata -b do odbc.do $MY_SESSION " .
    $_SERVER['REMOTE_ADDR'];
    exec($EXE_CMD);
    $db_table=$MY_SESSION."_fig1";
include("controller/getdatackd.php");
$obj_getdatackd=new getdatackd();
$datafeed=$obj_getdatackd->getdata($db_table);

$datan1=number_format($datafeed[14][value]);
$datan2=number_format($datafeed[1][value]);
$datan3=number_format($datafeed[2][value]);
$datan4=number_format($datafeed[3][value]);
$datan5=number_format($datafeed[0][value]);
$datan6=number_format($datafeed[4][value]);
$datan7=$datafeed[5][value];
$datan8=number_format($datafeed[6][value]);
$datan9=$datafeed[7][value];
$datan10=number_format($datafeed[8][value]);
$datan11=$datafeed[9][value];
$datan12=number_format($datafeed[10][value]);
$datan13=$datafeed[11][value];
$datan14=number_format($datafeed[12][value]);
$datan15=$datafeed[13][value];

function ImageRectangleWithRoundedCorners(&$im, $x1, $y1, $x2, $y2, $radius, $color){
 // draw rectangle without corners
 imagefilledrectangle($im, $x1+$radius, $y1, $x2-$radius, $y2, $color);
 imagefilledrectangle($im, $x1, $y1+$radius, $x2, $y2-$radius, $color);
 // draw circled corners
 imagefilledellipse($im, $x1+$radius, $y1+$radius, $radius*2, $radius*2, $color);
 imagefilledellipse($im, $x2-$radius, $y1+$radius, $radius*2, $radius*2, $color);
 imagefilledellipse($im, $x1+$radius, $y2-$radius, $radius*2, $radius*2, $color);
 imagefilledellipse($im, $x2-$radius, $y2-$radius, $radius*2, $radius*2, $color);
}
$imWidth = 690;
$imHeight = 510;
$im = imagecreatetruecolor($imWidth, $imHeight);
$white = imagecolorallocate($im, 255, 255, 255);
$blue = imagecolorallocate($im, 0, 0, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$Hilight = imagecolorallocate($im, 146, 151, 3);
$myColor1 = imagecolorallocate($im, 208, 216, 232);
//$myColor2 = imagecolorallocate($im, 79, 129, 189); <-- Old color
$myColor2 = imagecolorallocate($im, 246, 248, 251);
$myColor3 = imagecolorallocate($im, 79, 129, 189);
$font = "font/THSarabun.ttf";
imagefilledrectangle($im, 0, 0, $imWidth, $imHeight, $white);

$x1 = 10; $x2 = 200;
$y1 = 10; $y2 = 500;
ImageRectangleWithRoundedCorners($im,$x1,$y1,$x2,$y2,20,$myColor1);
$x1 = 250; $x2 = 440;
$y1 = 10; $y2 = 500;
ImageRectangleWithRoundedCorners($im,$x1,$y1,$x2,$y2,20,$myColor1);
$x1 = 490; $x2 = 680;
$y1 = 10; $y2 = 500;
ImageRectangleWithRoundedCorners($im,$x1,$y1,$x2,$y2,20,$myColor1);

$x1 = 10; $x2 = 200;
$y1 = 10; $y2 = 500;
imagettftext($im, 18, 0, 35, 40, $black, $font, "จำนวนผู้ป่วยเบาหวาน");
imagettftext($im, 18, 0, 80, 65, $black, $font, "ทั้งหมด");
imagesetthickness($im, 5);
imageline($im,$x2-10,295,260,225,$myColor3);
imageline($im,$x2-10,295,260,295,$myColor3);
imageline($im,$x2-10,295,260,365,$myColor3);
imagesetthickness($im, 1);
ImageRectangleWithRoundedCorners($im,$x1+10,260,$x2-10,330,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,265,$x2-15,325,5,$myColor2);
imagettftext($im, 16, 0, 60, 300, $black, $font, "N =".$datan1."คน");

$x1 = 250; $x2 = 440;
$y1 = 10; $y2 = 500;
imagettftext($im, 18, 0, 310, 40, $black, $font, "การคัดกรอง");
imagettftext($im, 18, 0, 330, 65, $black, $font, "CKD");
imagesetthickness($im, 5);
imageline($im,$x2-10,295,500,130,$myColor3);
imageline($im,$x2-10,295,500,225,$myColor3);
imageline($im,$x2-10,295,500,295,$myColor3);
imageline($im,$x2-10,295,500,365,$myColor3);
imageline($im,$x2-10,295,500,460,$myColor3);
imagesetthickness($im, 1);
ImageRectangleWithRoundedCorners($im,$x1+10,180,$x2-10,250,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,185,$x2-15,245,5,$myColor2);
imagettftext($im, 16, 0, 330, 210, $black, $font, "ปกติ");
imagettftext($im, 16, 0, 270, 230, $black, $font, "        N = ".$datan2." คน");
ImageRectangleWithRoundedCorners($im,$x1+10,260,$x2-10,330,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,265,$x2-15,325,5,$myColor2);
imagettftext($im, 16, 0, 320, 290, $black, $font, "เป็น CKD");

imagettftext($im, 16, 0, 270, 310, $black, $font, "        N = ".$datan3." คน");
//imagettftext($im, 16, 0, 270, 310, $black, $font, "N = xxxx คน  (xx.x%)");
ImageRectangleWithRoundedCorners($im,$x1+10,340,$x2-10,490,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,345,$x2-15,485,5,$myColor2);
imagettftext($im, 16, 0, 270, 370, $black, $font, "   ยังไม่ได้รับการคัดกรอง");
imagettftext($im, 16, 0, 270, 390, $black, $font, "        N = ".$datan4." คน");
imagettftext($im, 16, 0, 270, 410, $red, $font, "*ในจำนวนนี้มี ".$datan5." คน");
imagettftext($im, 16, 0, 270, 430, $red, $font, "ที่มี egfr>=60 แต่ไม่มีผล");
imagettftext($im, 16, 0, 270, 450, $red, $font, "Urine Analysis จึงยังคง");
imagettftext($im, 16, 0, 270, 470, $red, $font, "อยุ่ในกลุ่มที่ยังไม่ได้คัดกรอง");
imagettftext($im, 16, 0, 270, 490, $red, $font, "เพราะระบุ stage ไม่ได้");
$x1 = 490; $x2 = 680;
$y1 = 10; $y2 = 500;
imagettftext($im, 18, 0, 508, 40, $black, $font, "จำนวนผู้ป่วย จำแนกตาม");
imagettftext($im, 18, 0, 510, 65, $black, $font, "ระดับ eGFR และ Urine");
imagettftext($im, 18, 0, 530, 90, $black, $font, "protien ครั้งล่าสุด");

ImageRectangleWithRoundedCorners($im,$x1+10,100,$x2-10,170,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,105,$x2-15,165,5,$myColor2);
imagettftext($im, 16, 0, 565, 130, $black, $font, "stage 1");
imagettftext($im, 16, 0, 510, 150, $black, $font, "N = ".$datan6." คน (".$datan7."%)");
ImageRectangleWithRoundedCorners($im,$x1+10,180,$x2-10,250,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,185,$x2-15,245,5,$myColor2);
imagettftext($im, 16, 0, 565, 210, $black, $font, "stage 2");
imagettftext($im, 16, 0, 510, 230, $black, $font, "N = ".$datan8." คน (".$datan9."%)");
ImageRectangleWithRoundedCorners($im,$x1+10,260,$x2-10,330,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,265,$x2-15,325,5,$myColor2);
imagettftext($im, 16, 0, 565, 290, $black, $font, "stage 3");
imagettftext($im, 16, 0, 510, 310, $black, $font, "N = ".$datan10." คน (".$datan11."%)");
ImageRectangleWithRoundedCorners($im,$x1+10,340,$x2-10,410,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,345,$x2-15,405,5,$myColor2);
imagettftext($im, 16, 0, 565, 370, $black, $font, "stage 4");
imagettftext($im, 16, 0, 510, 390, $black, $font, "N = ".$datan12." คน (".$datan13."%)");
ImageRectangleWithRoundedCorners($im,$x1+10,420,$x2-10,490,10,$white);
ImageRectangleWithRoundedCorners($im,$x1+15,425,$x2-15,485,5,$myColor2);
imagettftext($im, 16, 0, 565, 450, $black, $font, "stage 5");
imagettftext($im, 16, 0, 510, 470, $black, $font, "".$datan14." คน (".$datan15."%)");

/////////////////////////
//imagettftext($im, 60, 45,380, 490, $red, $font, "In progress...");
imagepng($im,"image/diagram1.png");
imagedestroy($im);
?>
