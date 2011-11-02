<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chain Select With Codeigniter and Jquery</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
  </head>
  <body>
    <!-- page content -->
    <div id="propinsi" style="width:250px;float:left;">
    Propinsi : <br/>
    <?php
        echo form_dropdown("provinsi_id",$option_propinsi,"","id='propinsi_id'");
    ?>
    </div>
    <div id="kota">
    Kota / Kabupaten :<br/>
    <?php
        echo form_dropdown("kota_id",array('Pilih Kota / Kabupaten'=>'Pilih Propinsi Dahulu'),'','disabled');
    ?>
    </div>
    <div id="kecamatan">
    Kecamatan :<br/>
    <?php
        echo form_dropdown("kota_id",array('Pilih Kecamatan'=>'Pilih Kabupaten / Kota Dahulu'),'','disabled');
    ?>
    </div>
    <script type="text/javascript">
        $("#propinsi_id").change(function(){
                var propinsi_id = {propinsi_id:$("#propinsi_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('chain/select_kota')?>",
                        data: propinsi_id,
                        success: function(msg){
                            $('#kota').html(msg);
                        }
                    });
        });

        $('body').delegate("#kota_id","change", function() {
//        $('body').on("change","#kota_id", function() {
      		var kota_id = {kota_id:$("#kota_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('chain/select_kecamatan')?>",
                        data: kota_id,
                        success: function(msg){
                            $('#kecamatan').html(msg);
                            //alert('success');
                        }
                    });
		});
       </script>
  </body>
</html>

