<!DOCTYPE >
<html>
	<head><title>PENDAFTARAN MAHASISWA BARU - POLITEKNIK KOTA MALANG</title></head>
	<link rel="stylesheet" href="<?php echo base_url() ?>stylesheets/css.css" type="text/css"  media="screen" />
	<link rel="stylesheet" href="<?php echo base_url() ?>stylesheets/jquery-ui-1.8.16.custom.css" type="text/css"  media="screen" />
	<script src="<?php echo base_url() ?>javascripts/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>javascripts/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>javascripts/style.js" type="text/javascript"></script>
	<body>
	<div id="content">
	<span id="subheader"><h2><?php echo $subheader; ?></h2></span>

	<?php echo form_open(site_url()."/pmb/submit","action=POST") ?>
		<fieldset>
			<legend>I. Program Studi Pilihan</legend>
			<table class="table_input">
				<tr>
					<td class="left_td">Pilihan 1</td><td>:</td><td><?php echo form_dropdown("pilihan_1",$jurusan,"","class='select'")?></td>
				</tr>
				<tr>
					<td class="left_td">Pilihan 2</td><td>:</td><td><?php echo form_dropdown("pilihan_2",$jurusan,"","class='select'")?></td>
				</tr>
				<tr>
					<td class="left_td">Pilihan 3</td><td>:</td><td><?php echo form_dropdown("pilihan_3",$jurusan,"","class='select'")?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>II. Data Pribadi</legend>
			<table  class="table_input">
				<tr>
					<td class="left_td">Nama Lengkap</td><td>:</td><td><?php echo form_input($input_nama_lengkap);?></td>
				</tr>
				<tr>
					<td class="left_td">Jenis Kelamin</td><td>:</td><td><?php echo form_radio($input_jenis_kelamin,'L');?>Laki-laki <?php echo form_radio($input_jenis_kelamin,'P');?>Perempuan</td>
				</tr>
				<tr>
					<td class="left_td">Tempat Lahir</td><td>:</td><td><?php echo form_input($input_tempat_lahir);?></td>
				</tr>
				<tr>
					<td class="left_td">Tanggal Lahir</td><td>:</td><td><?php echo form_dropdown("tanggal",$date,"","class='select date'"); echo form_dropdown("bulan",$month,"","class='select date'"); echo form_dropdown("tahun",$year,"","class='select date'");?></td>
				</tr>
				<tr>
					<td class="left_td">Agama</td><td>:</td><td><?php echo form_dropdown("agama",$agama,"","class='select'");?></td>
				</tr>
				<tr>
					<td class="left_td">Alamat Asal</td><td>:</td><td><?php echo form_textarea($input_alamat_asal);?></td>
				</tr>
				<tr>
					<td class="left_td">Alamat Sekarang</td><td>:</td><td><?php echo form_textarea($input_alamat_sekarang);?></td>
				</tr>
				<tr>
					<td class="left_td">Telp / HP</td><td>:</td><td><?php echo form_input($input_no_telp);?></td>
				</tr>
				<tr>
					<td class="left_td">Email</td><td>:</td><td><?php echo form_input($input_email);?></td>
				</tr>
				<tr>
					<td class="left_td">Asal Sekolah</td><td>:</td><td><?php echo form_input($input_asal_sekolah);?></td>
				</tr>
				<tr>
					<td class="left_td">Tahun Lulus</td><td>:</td><td><?php echo form_input($input_tahun_lulus);?></td>
				</tr>
				<tr>
					<td class="left_td">Jurusan</td><td>:</td><td><?php echo form_dropdown("jurusan_sma",$jurusan_sma,"","class='select'");?></td>
				</tr>
				<tr>
					<td class="left_td">Nilai UN</td><td>:</td><td><?php echo form_input($input_nun)?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>III. Data Keluarga</legend>
			<table class="table_input">
				<tr>
					<td class="left_td">Nama Ayah</td><td>:</td><td><?php echo form_input($input_nama_ayah);?></td>
				</tr>
				<tr>
					<td class="left_td">Pekerjaan</td><td>:</td><td><?php echo form_input($input_pekerjaan_ayah);?></td>
				</tr>
				<tr>
					<td class="left_td">Nama Ibu</td><td>:</td><td><?php echo form_input($input_nama_ibu);?></td>
				</tr>
				<tr>
					<td class="left_td">Pekerjaan</td><td>:</td><td><?php echo form_input($input_pekerjaan_ibu);?></td>
				</tr>
				<tr>
					<td class="left_td">Alamat Orang Tua</td><td>:</td><td><?php echo form_textarea($input_alamat_orang_tua);?></td>
				</tr>
				<tr>
					<td class="left_td">Telp / HP</td><td>:</td><td><?php echo form_input($input_no_telp_orang_tua);?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>IV. Biaya Pendidikan</legend>
			Sumber biaya pendidikan selama kuliah :<br>
			<?php echo form_checkbox($input_jenis_biaya,'1');?>Orang Tua 
			<?php echo form_checkbox($input_jenis_biaya,'2');?>Mandiri
			<?php echo form_checkbox($input_jenis_biaya,'3');?>Beasiswa/Sponsor
			<?php echo form_checkbox($input_jenis_biaya,'4');?>Lainnya <?php echo form_input($input_biaya_lainnya)?>
		</fieldset>
		<fieldset>
			<legend>V. Lain-lain</legend>
		Mendapatkan info POLTEKOM dari :<br>
			<?php echo form_checkbox($input_jenis_info,'1');?>Brosur / Spanduk 
			<?php echo form_checkbox($input_jenis_info,'2');?>Sekolah
			<?php echo form_checkbox($input_jenis_info,'3');?>Koran
			<?php echo form_checkbox($input_jenis_info,'4');?>Teman / Saudara
			<?php echo form_checkbox($input_jenis_info,'5');?>Lainnya <?php echo form_input($input_info_lainnya)?>
		</fieldset>
		<div id="center">
			<?php 
				echo form_submit('submit','Kirim',"class=button");
				echo "   ";
				echo form_reset('reset','Reset',"class=button");
				echo form_close();
			?>
		</div>
	</div>
	</body>
</html>
