function getdatackd(db_table,keydecrypt,data_type_id) {
  $.get( "getdata_notscreen.php?db_table="+db_table+"&keydecrypt="+keydecrypt+"&data_type_id="+data_type_id, function( data ) {
    $( "#result" ).html( data );
  });

}


function getdata_emr(cid,keydecrypt) {
  $.get( "getemr.php?cid="+cid+"&keydecrypt="+keydecrypt, function( data ) {
    $( "#dataEmr" ).html( data );
  });

}


$(document).on("click", "#getmodal", function() {
  $( "#keyckd" ).val("");
  $( "#result" ).html("");
  $( "#report_title" ).html("");
  var data_table=$(this).attr('data_table');
  var data_type_id=$(this).attr('data_type_id');
  var data_title=$(this).attr('data_title');

  $( "#result" ).attr( "data_table", data_table);
  $( "#result" ).attr( "data_type_id", data_type_id );
  $( "#report_title" ).html(data_title);
   });

$(document).on("click", "#submitkey", function() {
  $( "#dataEmr" ).html("");
  var data_table=$("#result").attr('data_table');
  var data_type_id=$("#result").attr('data_type_id');
var keydecrypt=$( "#keyckd" ).val();
getdatackd(data_table,keydecrypt,data_type_id);
   });


   $(document).on("click", "#submit_emr", function() {
     var cid=$( "#cid" ).val();
   var keydecrypt=$( "#pwd" ).val();
   if(cid.length <= 0 || keydecrypt.length <= 0){
    alert("กรุณากรอกข้อมูลให้ครบถ้วน");
   }else{
     getdata_emr(cid,keydecrypt);

   }

      });


      $(document).on("click", "#reset_emr", function() {
        var cid=$( "#cid" ).val("");
      var keydecrypt=$( "#pwd" ).val("");
      $( "#dataEmr" ).html("");
         });
