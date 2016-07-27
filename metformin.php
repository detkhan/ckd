<?php

$db_table_metformin=$MY_SESSION."_metformin";
$datafeed_metformin=$obj_getdatackd->getdata($db_table_metformin);
$totaldata_metformin=count($datafeed_metformin);
?>
<html>
<head>
<title>Metformin Chart</title>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
<script type="text/javascript">
  FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'pie2d',
    renderAt: 'chart-container',
    width: '100%',

    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "สัดส่วนผู้ป่วย CKD Stage3-5 ที่ได้รับยา Metformin ในช่วง 3 เดือนที่ผ่านมา",
            "subCaption": "",
            "numberSubfix": "%",
            "showpercentvalues": "1",
            "showPercentInTooltip": "1",
            "decimals": "1",
            "useDataPlotColorForLabels": "1",
            //Theme
            "theme": "fint"
        },
        "data": [
          <?php
for ($i=0; $i <$totaldata_metformin ; $i++) {
  # code...


           ?>
          {
            "label": "stage:<?php echo $datafeed_metformin[$i][stage]  ?>  จำนวน <?php echo number_format($datafeed_metformin[$i][number])  ?> คน",
            "value": "<?php echo $datafeed_metformin[$i][percent]  ?>"
        },
        <?php

}

         ?>
      ]
    }
}
);
    fusioncharts.render();
});
</script>
</head>
<body><center>
  <div id="chart-container">Metformin Chart</div>
</center>
</body>
</html>
