<?php

$db_table_aceiarb=$MY_SESSION."_aceiarb";
$datafeed_aceiarb=$obj_getdatackd->getdata($db_table_aceiarb);
$totaldata_aceiarb=count($datafeed_aceiarb);
?>
<html>
<head>
<title>Aceiarb Chart</title>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
<script type="text/javascript">
  FusionCharts.ready(function(){
    var fusioncharts2 = new FusionCharts({
    type: 'pie2d',
    renderAt: 'chart-container2',
    width: '100%',

    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "สัดส่วนผู้ป่วย CKD Stage3-5 ที่ได้รับยา ACEI/ARB ในช่วง 3 เดือนที่ผ่านมา",
            "subCaption": "",
            "showpercentvalues": "1",
            "showPercentInTooltip": "1",
            "decimals": "2",
            "useDataPlotColorForLabels": "1",
            //Theme
            "theme": "fint"
        },
        "data": [
          <?php
for ($i=0; $i <$totaldata_aceiarb ; $i++) {
  # code...


           ?>
          {
            "label": "stage:<?php echo $datafeed_aceiarb[$i][stage]  ?>  จำนวน <?php echo number_format($datafeed_aceiarb[$i][number])  ?> คน",
            "value": "<?php echo $datafeed_aceiarb[$i][percent]  ?>"
        },
        <?php

}

         ?>
      ]
    }
}
);
    fusioncharts2.render();
});
</script>
</head>
<body>
<center>
<div id="chart-container2">Aceiarb Chart</div>
</center>
</body>
</html>
