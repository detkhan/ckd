<!DOCTYPE html>
<?header( 'Content-Type:text/html; charset=utf-8');?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DAMASAC CKD</title>
 
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="chart/js/swfobject.js"></script>
<script type="text/javascript">
swfobject.embedSWF(
  "open-flash-chart.swf", "my_chart","500","300",
  "9.0.0", "expressInstall.swf",
  {"data-file":"chart/data-files/bar-4.txt"}
  );
</script>
</head>
<body>
<script>
function doCall() {
var texthn = document.getElementById("texthn").value;
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("mySpan").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "hnrequest.php?texthn="+texthn, true);
  xhttp.send();
}
</script>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <ul class="nav navbar-top-links navbar-right">
                <li><img src="damasaclogo.png" alt="Mountain View" style="width:372px;height:76.2px;"></li>
            </ul>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
      <form role="form" action="#" method="post">
                        <li>
       <div class="form-group"> 
        <label for="zone">เลือกปีงบประมาณ</label>
        <select class="form-control">
         <option selected=true disabled="disabled">2558</option>
        </select>
       </div>
                        </li>      
                        <li>
       <div class="form-group"> 
        <label for="zone">เลือกเขตบริการสุขภาพ</label>
        <select class="form-control">
         <option selected=true disabled="disabled">เขต 9</option>
        </select>
       </div>
                        </li>
      <li>
       <div class="form-group">
        <label for="zone">เลือกจังหวัด</label>
        <select class="form-control">
         <option selected=true disabled="disabled">ชัยภูมิ</option>
        </select>
       </div>
                        </li>
                        <li>
       <div class="form-group">
        <label for="zone">เลือกอำเภอ</label>
        <select class="form-control">
         <option selected=true disabled="disabled">อ.เมือง</option>
        </select>
       </div>
                        </li>      
                        <li>
       <div class="form-group">
        <label for="zone">เลือกโรงพยาบาล</label>
        <select class="form-control">
         <option selected=true disabled="disabled">โรงพยาบาลชัยภูมิ</option>
        </select>
       </div>
                        </li>
                        <li>
       <div class="form-group">
        <center><button type="submit" class="btn btn-primary">เรียกดูรายงาน</button></center> 
       </div>
                        </li>
      </form>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- Row 1----------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3><center>รายงานสถานการณ์การคัดกรองและการจัดการผู้ป่วยโรคไตวายเรื้อรังในผู้ป่วยเบาหวาน/ความดัน</center></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!--Row 2------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="row">
<!-- Row 2 First column col-lg-8-------------------------------------------------------------------------------------------------------------------------------------->
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap fa-fw"></i> สรุปจำนวนการคัดกรองโรคไตวายเรื้อรังในกลุ่มผู้ป่วยเบาหวาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!--<div id="morris-area-chart"></div>-->
       
       <div><center><img src="image/diagram1.png?x=<?=microtime(true);?>" class="img-responsive" alt="diagram1.png"></center></div>
       <div class="row">
        <div class="col-lg-4"><button class="btn btn-default btn-block" data-toggle="modal" data-target="#basicModal">ผู้ป่วย DM/HT ที่ยังไม่อยู่ในฐาน HDC</button></div>
        <div class="col-lg-4"><button class="btn btn-default btn-block" data-toggle="modal" data-target="#basicModal_2">ผู้ป่วย DM/HT ที่ยังไม่ได้รับการคัดกรอง CKD</button></div> 
        <div class="col-lg-4"><button class="btn btn-default btn-block" data-toggle="modal" data-target="#basicModal_3">ผู้ป่วย DM/HT ที่การคัดกรองเกิน 1 ปีที่ผ่านมา</button></div>           
       </div>
       <div class="modal fade" id="basicModal">
        <div class="modal-dialog">
          <div class="modal-content">
         <div class="modal-header">
           <br>
           <table class="table table-bordered table-hover table-striped">
           <thead>
           <tr>
            <th align='left'><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></th>
            <th align='right'>Download รายชื่อในรูปแบบ Excel file&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="file/hdc_no_list.xlsx"><img src="image/ex-icon.png" alt="download"></a></th>
           </tr>           
           <tr><th colspan=2><u> รายชื่อผู้ป่วยที่ได้รับการคัดกรอง CKD แล้วแต่ยังไม่มีชื่ออยู่ในฐานข้อมูลของ HDC</u><BR>
            กลุ่ม eGFR < 60 = <font color='blue'>1,346</font> คน, กลุ่ม eGFR >= 60 แต่ไม่มีผล Urine protien = <font color='blue'>3,147</font>
           </th></tr>
           </thead>
           </table>
         </div>
          <div class="modal-body">
           <div class="table-responsive">
           <table class="table table-bordered table-hover table-striped">
            <!--<table  class="table table-striped table-border">-->
            <thead>
            <tr>
            <th><center>HN</center></th>
            <th><center>ชื่อ-นามสกุล</center></th>
            <th><center>ระดับ eGFR</center></th>
            </tr>
            </thead>
            <tbody>
             <?php
             $servername = "www.cascap.in.th";
             $username = "ckd";
             $password = "ckd!@#$%";
             $dbname = "ckdreport";

             // Create connection
             $conn = mysqli_connect($servername, $username, $password, $dbname);
           
             // Check connection
             if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
             }
             $sql = "SET NAMES utf8";
             $result = mysqli_query($conn, $sql);
             
             $sql = "SELECT * FROM hdc_no_old";
             $result = mysqli_query($conn, $sql);
             ?>
             <?php
             if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
               echo "<tr>" ;
               echo "<td>".$row['hn']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['ckd_screen']."</td>";
               echo"</tr>" ;
              }
             } else {
              echo "0 results";
             }
             ?>
            </tbody>
           </table>
          </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
          </div>
        </div>
       </div>
       <div class="modal fade" id="basicModal_2">
        <div class="modal-dialog">
          <div class="modal-content">
         <div class="modal-header">
           <br>
           <table class="table table-bordered table-hover table-striped">
           <thead>
           <tr>
            <th align='left'><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></th>
            <th align='right'>Download รายชื่อในรูปแบบ Excel file&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="file/no_screen.xlsx"><img src="image/ex-icon.png" alt="download"></a></th>
           </tr>           
           <tr><th colspan=2><u> รายชื่อผู้ป่วย DM/HT ที