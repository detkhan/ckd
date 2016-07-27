<?php header( 'Content-Type:text/html; charset=tis-620');?>
<html>
<head> 
 <?php 
 session_start();
 date_default_timezone_set('Asia/Bangkok');
 /////////////////////////////////////////////////////////
 //echo "SESSION: " . $_SESSION['userlogin']['id'] . "<br>";
 if($_SESSION['userlogin']['id']==''){
  echo "<meta http-equiv=\"refresh\" content=\"0;url=http://" . $_SERVER["HTTP_HOST"] . "/main.php\">";
  exit;
 }
 //////////////////////////////////////////////////////////

 include("db_connect.inc");
 include("functions.php");
 mysql_select_db("cascap_data");
 $sql = "SHOW TABLE STATUS LIKE 'tb_data_1'";
 $result = mysql_query($sql);
 $rs = mysql_fetch_array($result);
 $DB_UpdateTime = $rs["Update_time"];
 mysql_select_db($central_db);
 //$filename = "/var/www/html/report1/datacloud/CCA01_cloud.dta"; //<-- Old protocal
 $filename = "/var/www/html/song/odbc/cascapcloud_".date("jMY")."/CCA01_cloud.dta"; //<-- New protocal
 if (file_exists($filename))
  $DS_UpdateTime = date ("Y-m-d H:i:s", filemtime($filename));
 ?>
 <meta name=ProgId content=Word.Document>
 <meta name=Generator content="Microsoft Word 14">
 <meta name=Originator content="Microsoft Word 14">
 <link href="css/styles.css" rel="stylesheet" />
 <script src="pace-master/pace.js"></script>
 <link rel="stylesheet" href="pace-master/themes/blue/pace-theme-corner-indicator.css" />
 <link rel="stylesheet" href="css/mbExtruder.css" media="all"  type="text/css">
 <link rel="stylesheet" href="css/flowchart.css" media="all"  type="text/css"><center>
 <script>
 paceOptions = {
   elements: false
 };

 function ReportGen(){
  window.location.href="?sd="+document.getElementById("txtSDate").value+"&ed="+document.getElementById("txtEDate").value+"&zone="+document.getElementById("selZone").value+"&prov="+document.getElementById("selProv").value+"&hosp="+document.getElementById("selHosp").value;
 }
 function Back2Main(){
  window.location.href="/main.php";
 }
 function doMenu(item) {
  if (item=="all"){
   obj=document.getElementById("m1");
   op = (obj.style.display=="none") ? "block" : "none";
   for(i=1;i<=9;i++){
    obj=document.getElementById("m"+i);
    obj.style.display = op;
   }
  }else{
   obj=document.getElementById(item);
   obj.style.display = (obj.style.display=="none") ? "block" : "none";
  }
 }

 </script>
 <script>
 function load(time){
   var x = new XMLHttpRequest()
   x.open('GET', "http://localhost:5646/walter/" + time, true);
   x.send();
 };
 load(10);
 setTimeout(function(){Pace.ignore(function(){load(3100);});}, 4000);
 Pace.on('hide', function(){console.log('done');});
 </script>
 <style>
  html, body, #body-content {
   height: 100%;
   margin: 0px;
   padding: 0px;
   background-image: url('images/noise.jpg');
  }
  table {
   border-width: 1px;
  }
  tr, td {
   padding: 1px;
  }
  /* border-left-style example classes */
  .b1 {border-left-style:none;}
  .b2 {border-right-style:none;}
 </style>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>   
 <script type="text/javascript" src="inc/jquery.mb.flipText.js"></script>
 <script type="text/javascript" src="inc/mbExtruder.js"></script>
 <script type="text/javascript">
 
  $(function(){
   $("#extruderLeft").buildMbExtruder({
    position:"left",
    width:300,
    extruderOpacity:.8,
    hidePanelsOnClose:true,
    accordionPanels:true,
    onExtOpen:function(){},
    onExtContentLoad:function(){},
    onExtClose:function(){}
   });
  });
  
 </script>
 <!--////////////////////////////// DateTime Picker ////////////////////////////-->
 <link href="css/jquery-ui-1.8.9.custom.css" rel="Stylesheet" type="text/css" />
 <!-- <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script> //-->
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <!--////////////////////////////////////////////////////////////////////////////-->
 <script src="js/hosp.js"></script>
 <script>
  //<![CDATA[ 
  var Zone = new Array(5);
  Zone["999"] = ["999:ทั้งหมด"]; 
  <?php 
  $sql = "SELECT zone_code FROM all_hospital_thai WHERE (zone_code<>'') GROUP BY zone_code ORDER BY zone_code ASC";
  $result0 = mysql_query($sql);
  while($rs0 = mysql_fetch_array($result0)){
   $i = ($rs0[0]+0);
  //for($i=7;$i<=10;$i++){
  $myZone = "Zone[\"" . $i . "\"] = [";
  $sql = "SELECT * FROM province WHERE (zone='" . $i . "') ORDER BY BINARY province ASC";
  $result = mysql_query($sql);
  while($rs = mysql_fetch_array($result)){
   $myZone .= "\"" . $rs[provincecode] . ":" . $rs[province] . "\",";
  }
  $myZone = substr($myZone,0,-1);
  $myZone .= "];\n";
  echo $myZone;
  }
  ?>
  function zoneChange(selectObj) { 
   var idx = selectObj.selectedIndex; 
   var which = selectObj.options[idx].value; 
   cList = Zone[which]; 
   var cSelect = document.getElementById("selProv"); 
   var len=cSelect.options.length; 
   while (cSelect.options.length > 0) { 
   cSelect.remove(0); 
   } 
   var newOption; 
   newOption = document.createElement("option"); 
   newOption.value = 999; 
   newOption.text = "ทั้งหมด"; 
   try { 
    cSelect.add(newOption);
   }   catch (e) { 
    cSelect.appendChild(newOption); 
   } 
   for (var i=0; i<cList.length; i++) { 
    newOption = document.createElement("option"); 
    prov_arr = cList[i].split(":");
    newOption.value = prov_arr[0]; 
    newOption.text = prov_arr[1]; 
    try { 
     cSelect.add(newOption); 
    }   catch (e) { 
     cSelect.appendChild(newOption); 
    } 
   }
   ////////////// Also clear elements from Hospital selector /////////////
   var cSelect = document.getElementById("selHosp"); 
   var len=cSelect.options.length; 
   while (cSelect.options.length > 0) { 
   cSelect.remove(0); 
   } 
   var newOption; 
   newOption = document.createElement("option"); 
   newOption.value = 999; 
   newOption.text = "ทั้งหมด"; 
   try { 
    cSelect.add(newOption); 
   }   catch (e) { 
    cSelect.appendChild(newOption); 
   } 
  } 
  function provinceChange(selectObj) { 
   var idx = selectObj.selectedIndex; 
   var which = selectObj.options[idx].value; 
   cList = Province[which]; 
   var cSelect = document.getElementById("selHosp"); 
   var len=cSelect.options.length; 
   while (cSelect.options.length > 0) { 
   cSelect.remove(0); 
   } 
   var newOption; 
   newOption = document.createElement("option"); 
   newOption.value = 999; 
   newOption.text = "ทั้งหมด"; 
   try { 
    cSelect.add(newOption); 
   }   catch (e) { 
    cSelect.appendChild(newOption); 
   } 
   for (var i=0; i<cList.length; i++) { 
    newOption = document.createElement("option"); 
    hosp_arr = cList[i].split(":");
    newOption.value = hosp_arr[0]; 
    newOption.text = hosp_arr[1]; 
    try { 
     cSelect.add(newOption); 
    }   catch (e) { 
     cSelect.appendChild(newOption); 
    } 
   } 
  } 
 //]]>
 </script>
 <script src="js/jsFile.js"></script>

</head>

<body<?php if($_GET["sd"]==""){?> onload="$('#extruderLeft').openMbExtruder(true);$('#extruderLeft').openPanel()"<?php }?>>

<center>
<div id="body-content">
 <?php echo "&nbsp;";ob_flush();flush();?>
 <?php if($_GET["sd"]==""){?>
  <center>
  <!--<img src="images/CASCAP_workshop_01.png" width=900 height=60><br><br><br>//-->
  <font face="TH SarabunPSK" size=6><b>รายงานผลการวิเคราะห์ข้อมูล การตรวจคัดกรองมะเร็งท่อน้ำดี (จำแนกตามหน่วยบริการ)</b></font>
  <br>
  <font face="TH SarabunPSK" size=5>ฐานข้อมูลอัพเดทล่าสุดเมื่อ <font color=blue><?=MyDateTime($DB_UpdateTime);?></font></font>
  <br>
  <font face="TH SarabunPSK" size=5>Data set for STATA อัพเดทล่าสุดเมื่อ <font color=blue><?=MyDateTime($DS_UpdateTime);?></font></font>
  <br><br>
  <span class="btn" onclick="$('#extruderLeft').openMbExtruder(true);$('#extruderLeft').openPanel()">
  <font face="TH SarabunPSK" color=red size=5>โปรดระบุตัวเลือกเพื่อสร้างรายงาน</font>
  </span>
  </center>
 <?php }else{
   ///////////// Clear all old tables from database //////////////
   $sql = "SELECT * FROM information_schema.tables WHERE TABLE_NAME < '" . date("Ymd",time()) . "%'";
   $result = mysql_query($sql);
   while($rs = mysql_fetch_array($result)){
    $sql = "DROP TABLE IF EXISTS " . $rs[TABLE_NAME];
    mysql_query($sql);
   }
   /////////// Delete old image files from the server ////////////
   $current_date = date("Ymd") . "0000000000";
   $dir = "/var/www/html/report1/userdata";
   $dh  = opendir($dir);
   while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
   }
   sort($files);
   foreach($files as $val){
    if($val<>"." && $val<>".."){
     $temp = substr($val,strpos($val,"_")+1,-4);
     if($temp<=$current_date){
      unlink($dir."/".$val);
     }
    }
   }
   ////////////// Wait for ready state //////////////
   /*
   $CNT = 0;
   do{
    sleep(5);
    $result = mysql_query("SELECT * FROM success");
    $rs = mysql_fetch_array($result);
    $CNT++;
   }while($rs[0]=="waiting" && $CNT < 10);
   */
   ///////////////////// Session ///////////////////
   $start = microtime(true);
   $x = explode(".",$start);
   $y = str_pad($x[1], 4, "0", STR_PAD_RIGHT);
   $MY_SESSION = date("YmdHis") . $y;
   //$MY_SESSION = "201606240540005673";
   //////////////////////////////////////////////////
   $SDate = ($_GET["sd"]=="")?date("d/m/Y"):$_GET["sd"];
   $EDate = ($_GET["ed"]=="")?date("d/m/Y"):$_GET["ed"];
   $begin = STATA_Date($SDate);
   $end = STATA_Date($EDate);
   $zone = $_GET["zone"];
   $provincecode = $_GET["prov"];
   $sitecode = $_GET["hosp"];
   $z = str_pad($zone,2,"0",STR_PAD_LEFT);
   $p = str_pad($provincecode,2,"0",STR_PAD_LEFT);
   $s = str_pad($sitecode,5,"0",STR_PAD_LEFT);
   $EXE_CMD = "/usr/local/stata14/stata -b do operate.do $begin $end $z $p $s $MY_SESSION " . $_SERVER['REMOTE_ADDR'];
   exec($EXE_CMD);
   ?>
   <br>
   <font face="TH SarabunPSK" size=6><b>รายงานผลการวิเคราะห์ข้อมูล การตรวจคัดกรองมะเร็งท่อน้ำดี (จำแนกตามหน่วยบริการ)</b></font>
   <br>
   <font face="TH SarabunPSK" size=5>ฐานข้อมูลอัพเดทล่าสุดเมื่อ <font color=blue><?=MyDateTime($DB_UpdateTime);?></font></font>
   <br>
   <font face="TH S