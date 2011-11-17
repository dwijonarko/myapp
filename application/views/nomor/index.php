<!DOCTYPE >
<html>
	<head><title>Penomoran Surat POLITEKNIK KOTA MALANG</title></head>
	<link rel="stylesheet" href="<?php echo base_url() ?>style/css.css" type="text/css"  media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<body>
	<?php echo form_open("nomor/submit"); ?>
	<table>
	<tr>
		<td><?php echo form_label("Divisi"); ?></td>
		<td><?php echo form_dropdown("divisi",array("pilih"=>"Pilih Perihal","UM"=>"Umum (UM)","AK"=>"BAAK (AK)","UK"=>"UK"),"","id='divisi' class='select'"); ?></td>
	</tr>
	<tr>
		<td><?php echo form_label("Kode Perihal") ?></td>
		<td><?php echo form_input("perihal","","class='input' id='perihal'"); ?></td>
	</tr>
	<tr>
		<td><a href="#" id="generate" class="button big ">Generate</a></td>
		<td><a href="#" id="reset" class="button big">Reset</a></td>
	</tr>
	</table>
	<?php echo form_close(); ?>
	<div id="result">
	Nomor Surat : </br>
	</div>


	<script type="text/javascript">
  		$("#generate").click(function(){
			var format = {
							divisi:$("#divisi").val(),
							perihal:$("#perihal").val().toUpperCase(),
							ajax:1
						};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('nomor/submit')?>",
                        data: format,
                        success: function(msg){
                            $('#result').html(msg);
                        }
                    });
  		});
	</script>

	</body>
</html>

