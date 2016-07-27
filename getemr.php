<?php
$cid=$_GET[cid];
$keydecrypt=$_GET[keydecrypt];

echo "<br>";
include("controller/getdatackd.php");
$obj_getdatackd=new getdatackd();
$datafeedEmr=$obj_getdatackd->getEmr($cid,$keydecrypt);

$datafeedEgfr=$obj_getdatackd->getEgfr($cid,$keydecrypt);

$get_birthday=$datafeedEmr[0][birthdate];
if($get_birthday==""){
$birthday="";
}else{
$birthday=$obj_getdatackd->getBirthday($get_birthday);
}

if($datafeedEmr[0][sex]==1){
  $sex="ชาย";
}else{
  $sex="หญิง";
}
if($datafeedEmr[0][dm]==1){
  $dm="โรคเบาหวาน";
}else{
  $dm="";
}
if($datafeedEmr[0][ht]==1){
  $ht="โรคความดัน";
}else{
  $ht="";
}
$disease=$dm."  ".$ht;

?>
<div class="row">
<div class="col-md-3">
  <h5>HN:<?php echo $datafeedEmr[0][hn] ?></h5>
</div>
<div class="col-md-2">
  <h5>เพศ:<?php echo $sex ?></h5>
</div>
<div class="col-md-2">
<h5>อายุ:<?php echo $birthday ?>ปี</h5>
</div>
<div class="col-md-5">
<h5>โรคประจำตัว:<?php echo $disease ?> </h5>
</div>
</div>
<!-- Table -->
<h4>ระดับ eGFR ในช่วงไม่เกิน 1  ปี</h4>
<?
  $totaldata=count($datafeedEgfr);
  if($totaldata>1){



?>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th>วันที่</th>
      <th>stage</th>
      <th>eGFR</th>
    </tr>
  </thead>
  <tbody>
    <?php

    for ($i=0; $i <$totaldata ; $i++) {
     ?>
    <tr>
      <td><?php  echo $obj_getdatackd->getOrderDate($datafeedEgfr[$i][order_date]);  ?></td>
      <td><?php  echo $obj_getdatackd->getStage($datafeedEgfr[$i][stage]);  ?></td>
      <td><?php  echo $datafeedEgfr[$i][egfr];  ?></td>

    </tr>
    <?php
}
     ?>
  </tbody>
</table>
<?php
  }
 ?>
<?php
if($totaldata>1){
  date_default_timezone_set('Asia/Bangkok');
  $y = str_pad($x[1], 4, "0", STR_PAD_RIGHT);
  $MY_SESSION = date("YmdHis") . $y;
  $EXE_CMD = "/usr/local/stata14/stata -b do egfr_slope.do $MY_SESSION $cid $keydecrypt";
  exec($EXE_CMD);
 ?>
<div class="thumbnail" style="width:100%; margin:auto;" >
<img src="image/<?php echo $MY_SESSION ?>_egfr.png" alt="test photo" class="img-thumbnail" width="70%">
</div>

<?php
}
 ?>
</div>
