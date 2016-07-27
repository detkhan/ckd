<?php header( 'Content-Type:text/html;');?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบดูแลผู้ป่วยไตวายเรื้อรัง CKD (Chronic kidney disease)</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-item.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <!-- jQuery -->
    <script src="js/jquery.js"></script>
 <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<!-- load graph swfobject graph-->
<script type="text/javascript" src="chart/js/swfobject.js"></script>
<script type="text/javascript">
swfobject.embedSWF(
  "open-flash-chart.swf", "my_chart","500","300",
  "9.0.0", "expressInstall.swf",
  {"data-file":"chart/data-files/bar-4.txt"}
  );

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
<script src="js/ckd.js"></script>
</head>

<body>

<?php

  include("home.php");

?>
<?php include 'header.php'; ?>
    <!-- Page Content -->
<div class="container">
        <div class="row">
        <div class="col-md-3">
                <p class="lead">Filter</p>
                <div class="list-group">
                <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
    <form role="form" action="#" method="post">
    <li>
        <div class="form-group">
        <label for="zone">เลือกปีงบประมาณ</label>
        <select class="form-control">
        <option selected=true disabled="disabled">2558</option>
        <option>2559</option>
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
</ul>   <!-- ul side menu-->
</div>  <!--side menu -->
</div>  <!--navbar -->
</div>  <!--list group -->
</div>  <!-- col-->


    <!-- /.container -->

<div class="container">
    <div class="col-md-9">
    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sitemap fa-fw"></i> สรุปจำนวนการคัดกรองโรคไตวายเรื้อรังในกลุ่มผู้ป่วยเบาหวาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
        <div class="thumbnail" style="width:90%; margin:auto;" >

     <!--<div id="morris-area-chart"></div>-->

     <div><center><img src="image/diagram1.png?x=<?=microtime(true);?>" class="img-responsive" alt="diagram1.png"></center></div>
     <div class="row">

      <div class="col-lg-12"><button id="getmodal" data_table="<?= $MY_SESSION."_notscreen"   ?>"  class="btn btn-default btn-block btn-success" data-toggle="modal" data-target="#basicModal">ผู้ป่วย DM/HT ที่ยังไม่ได้รับการคัดกรอง CKD</button></div>

     </div>




     <!-- button1 -->
     <div id="basicModal" class="modal fade" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">ผู้ป่วย DM/HT ที่ยังไม่ได้รับการคัดกรอง CKD</h4>

       </div><!-- modal-header-->
       <div class="modal-body">
         <div class="form-group">
     <label for="keyckd">Enter Key</label>
     <input type="text" class="form-control" id="keyckd" placeholder="Enter Key ">
   </div><!-- form-group-->
   <button id="submitkey" type="submit" class="btn btn-default">Submit</button>
   <br><br><br>
   <div id="result" ></div><!-- result key-->
       </div><!-- modal-body-->
       <div class="modal-footer">
         <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div><!-- modal-footer-->
     </div><!-- modal-content-->

   </div><!-- modal-dialog-->
 </div><!-- modal-id-->
      <!--End button 1-->

  </div>
</div>
</div>
</div>
</div>
</div> <!-- row-->
<hr>
      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; DAMASAC : Data Management and Statistical Analysis Center| 2016</p>
              </div>
          </div>
      </footer>

</div>
<!-- /.container -->

  </body>
  </html>
