<?
require_once("database.php");
class getdatackd
{

function getdata($db_table)
{
  echo $db_table;
  echo "<br>";
  $clsMyDB = new MyDatabase();
  $sql = "SELECT  *  FROM ".$db_table;
echo $sql;
echo "<br>";
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


}//class


?>
