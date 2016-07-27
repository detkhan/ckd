<?php
$dateoneday=strtotime("1 January 1960");
echo $dateoneday;

$converterday=date("Y/m/d",$dateoneday);
echo "<br>";
echo $converterday;
echo "<br>";
$nowfrist=20314*3600*24;
$nowconverter=$nowfrist+$dateoneday;
$converterdaynow=date("d/m/Y",$nowconverter);
echo $converterdaynow;
echo "<br>";
?>
