<?
require_once("model/database.php");
class getdatackd
{

function getdata($db_table)
{
  $clsMyDB = new MyDatabase();
  $sql = "SELECT  *  FROM ".$db_table;
  $objSelect = $clsMyDB->fncSelectRecord($sql);

  if(!$objSelect)
  {
$objSelect="error";
  }
  else{
//$objpush=$objSelect;
$objpush=$objSelect;

  }
  return $objpush;
}//function adddata


function getdata_notscreen($db_table,$keydecrypt,$data_type_id)
{
  $clsMyDB = new MyDatabase();
  if($data_type_id<2){

  $sql = "SELECT  aes_decrypt(unhex(cid),'$keydecrypt') as cid,aes_decrypt(unhex(hn),'$keydecrypt') as hn  FROM ".$db_table;

}else{
  $sql = "SELECT  stage,aes_decrypt(unhex(cid),'$keydecrypt') as cid,aes_decrypt(unhex(hn),'$keydecrypt') as hn  FROM ".$db_table." ORDER BY stage ASC";
}
  $objSelect = $clsMyDB->fncSelectRecord($sql);

  if(!$objSelect)
  {
$objSelect="error";
  }
  else{
//$objpush=$objSelect;
$objpush=$objSelect;

  }
  return $objpush;
}//function getdata

function getEmr($cid,$keydecrypt){
  $clsMyDB = new MyDatabase();

  $sql = "select aes_decrypt(unhex(cid),'$keydecrypt') as cid ,aes_decrypt(unhex(hn),'$keydecrypt') as hn,sex,dm,ht,birthdate FROM   `emr` where aes_decrypt(unhex(cid),'$keydecrypt')='$cid' ORDER BY order_date DESC LIMIT 0,1";
  $objSelect = $clsMyDB->fncSelectRecord($sql);

  if(!$objSelect)
  {
$objSelect="error";
  }
  else{
//$objpush=$objSelect;
$objpush=$objSelect;

  }
  return $objpush;



}


function getEgfr($cid,$keydecrypt){
  $clsMyDB = new MyDatabase();

  $sql ="select  order_date,egfr,stage FROM   `emr` where aes_decrypt(unhex(cid),'$keydecrypt')='$cid' ORDER BY order_date ASC";
  $objSelect = $clsMyDB->fncSelectRecord($sql);

  if(!$objSelect)
  {
$objSelect="error";
  }
  else{
//$objpush=$objSelect;
$objpush=$objSelect;

  }
  return $objpush;



}//getEgfr


public function getOrderDate($value)
{
  $dateoneday=strtotime("1 January 1960");
  $nowfrist=$value*3600*24;
  $nowconverter=$nowfrist+$dateoneday;
  $converterdaynow=date("d/m/Y",$nowconverter);
  return $converterdaynow;
}

public function getBirthday($get_birthday)
{
  $dateoneday=strtotime("1 January 1960");
  $datenow=strtotime("now");
  $nowfrist=$get_birthday*3600*24;
  $nowconverter=($datenow-$nowfrist)/(3600*24*365);
  $converterdaynow=number_format($nowconverter);
  return $converterdaynow;
}

public function getStage($value)
{
  if($value=="" || $value=="99"){
  $stage="NA";
  }else{
  $stage=$value;
 }
 return $stage;
}

}//class


?>
