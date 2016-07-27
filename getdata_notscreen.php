<?php
$db_table=$_GET[db_table];
$keydecrypt=$_GET[keydecrypt];
$data_type_id=$_GET[data_type_id];
include("controller/getdatackd.php");
$obj_getdatackd=new getdatackd();
$datafeed=$obj_getdatackd->getdata_notscreen($db_table,$keydecrypt,$data_type_id);
//var_dump($datafeed);
$num=1;
 ?>
 <table class="table table-striped">
 <thead>
    <tr>
      <th>#</th>
      <?php
      if($data_type_id>1){
      ?>
      <th>STAGE</th>
      <?php
    }
       ?>
       <th>CID</th>
       <th>HN</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $totaldata=count($datafeed);
     for ($i=0; $i <$totaldata ; $i++) {
     ?>
     <tr>
       <th scope="row"><?php  echo $num  ?></th>
       <?php
       if($data_type_id>1){
       ?>
       <td><?php  echo $datafeed[$i][stage];  ?></td>
       <?php
     }
     ?>
       <td><?php  echo $datafeed[$i][cid];  ?></td>
       <td><?php  echo $datafeed[$i][hn];  ?></td>
      </tr>
      <?php
      $num++;
}
      ?>
    </tbody>
  </table>
