<!DOCTYPE >
<html>
	<head>
		<title>PENDAFTARAN MAHASISWA BARU - POLITEKNIK KOTA MALANG</title>
		<link rel="stylesheet" href="<?php echo base_url() ?>stylesheets/report.css" type="text/css"  media="screen" /></link>
		<script src="<?php echo base_url() ?>javascripts/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
	<div id="content">
	<table class="form_header" >
	<tr>
		<td rowspan="2" class="left top right"><img class="img" src="<?php echo base_url()?>images/logo-small.png" width=60px></td>
		<td rowspan="2" class="header top right"><?php echo $header; ?></td>
		<td class="top right">NO. DOKUMEN</td><td class="top right">DISAHKAN</td>
	</tr>
	<tr>
		<td class="top right"><?php echo $no_dokumen;?></td>
		<td class="top right">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" rowspan="3" class="subheader left top right bottom"><?php echo $subheader; ?></td>
		<td colspan="2" class="top right" style="text-align:left;padding-left:5px;">Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 04-01-2012</td>
	</tr>
	<tr>
		<td colspan="2" class="top right" style="text-align:left;padding-left:5px;">Revisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: - </td>
	</tr>
	<tr>
		<td colspan="2" class="top right bottom" style="text-align:left;padding-left:5px;">Halaman &nbsp;&nbsp;&nbsp;&nbsp;: 1</td>
	</tr>
	</table>
	<fieldset>
	<legend>I. Program Studi Pilihan</legend>
		<table>
			<tr>
				<td>1. <?php echo $pilihan_1?></td><td>2. <?php echo $pilihan_2?></td><td>3. <?php echo $pilihan_3?></td>
			</tr>
		</table>
	</fieldset>

	<fieldset>
	<legend>II. Data Pribadi</legend>
		<table>
			<tr>
				<td class="field">Nama Lengkap </td><td class="separator">:&nbsp;</td><td><?php echo $nama_lengkap?></td>
			</tr>
			<tr>
				<td class="field">Jenis Kelamin </td><td class="separator">:&nbsp;</td><td><?php echo $jenis_kelamin?></td>
			</tr>
			<tr>
				<td class="field">Tempat/ Tanggal Lahir </td><td class="separator">:&nbsp;</td><td><?php echo $tempat_lahir.", ".$tanggal_lahir ?></td>
			</tr>
			<tr>
				<td class="field">Agama </td><td class="separator">:&nbsp;</td><td><?php echo $agama ?></td>
			</tr>
			<tr>
				<td class="field">Alamat Asal </td><td class="separator">:&nbsp;</td><td><?php echo $alamat_asal ?></td>
			</tr>
			<tr>
				<td class="field">Alamat Sekarang </td><td class="separator">:&nbsp;</td><td><?php echo $alamat_sekarang ?></td>
			</tr>
			<tr>
				<td class="field">Telp./HP </td><td class="separator">:&nbsp;</td><td><?php echo $no_telp ?></td>
			</tr>
			<tr>
				<td class="field">Email </td><td class="separator">:&nbsp;</td><td><?php echo $email ?></td>
			</tr>
			<tr>
				<td class="field">Asal Sekolah </td><td class="separator">:&nbsp;</td><td><?php echo $asal_sekolah ?></td>
			</tr>
			<tr>
				<td class="field">Tahun Lulus </td><td class="separator">:&nbsp;</td><td><?php echo $tahun_lulus ?></td>
			</tr>
			<tr>
				<td class="field">Jurusan </td><td class="separator">:&nbsp;</td><td><?php echo $jurusan_sma ?></td>
			</tr>
			<tr>
				<td class="field">Nilai UN </td><td class="separator">:&nbsp;</td><td><?php echo $nilai_un ?></td>
			</tr>
		</table>
	</fieldset>
	<fieldset>
	<legend>III. Data Keluarga</legend>
		<table>
			<tr>
				<td class="field">Nama Ayah </td><td class="separator">:&nbsp;</td><td><?php echo $nama_ayah ?></td>
			</tr>
			<tr>
				<td class="field">Pekerjaan Ayah</td><td class="separator">:&nbsp;</td><td><?php echo $pekerjaan_ayah ?></td>
			</tr>
			<tr>
				<td class="field">Nama Ibu</td><td class="separator">:&nbsp;</td><td><?php echo $nama_ibu ?></td>
			</tr>
			<tr>
				<td class="field">Pekerjaan Ibu </td><td class="separator">:&nbsp;</td><td><?php echo $pekerjaan_ibu ?></td>
			</tr>
			<tr>
				<td class="field">Alamat Orang Tua / Wali </td><td class="separator">:&nbsp;</td><td><?php echo $alamat_orang_tua ?></td>
			</tr>
			<tr>
				<td class="field">Telp. HP </td><td class="separator">:&nbsp;</td><td><?php echo $no_telp_orang_tua ?></td>
			</tr>
			<tr>
				<td class="field">Nama Wali </td><td class="separator">:&nbsp;</td><td><?php echo $nama_wali ?></td>
			</tr>
			<tr>
				<td class="field">Pekerjaan Wali </td><td class="separator">:&nbsp;</td><td><?php echo $pekerjaan_wali ?></td>
			</tr>
			<tr>
				<td class="field">Alamat Wali </td><td class="separator">:&nbsp;</td><td><?php echo $alamat_wali ?></td>
			</tr>
			<tr>
				<td class="field">Telp. HP </td><td class="separator">:&nbsp;</td><td><?php echo $no_telp_wali ?></td>
			</tr>
		</table>
	</fieldset>
	<fieldset style="page-break-before: always">
	<legend>IV. Biaya Pendidikan</legend>
		Sumber biaya pendidikan selama kuliah :<br>
		<table><tr><td colspan="2">
		<?php
			$listvalue=array(1=>"Orang Tua",2=>"Mandiri",3=>"Beasiswa/Sponsor",4=>"Lainnya");
			$jenis_biaya = explode(",", $jenis_biaya);
			foreach ($listvalue as $key=>$value){
				if(in_array($key,$jenis_biaya)){
					echo "<img src='".base_url()."images/checkbox_checked.png'>".$value;
				}else{
					echo "<img src='".base_url()."images/checkbox.png'>".$value;
				}
			}
			?>
			</td></tr>
		  <tr><td colspan="2">&nbsp;</td></tr><tr><td class="field">Biaya Lainnya</td><td>:&nbsp;<?php echo $biaya_lainnya?></td></tr></table>
	</fieldset>
	<fieldset>
	<legend>V. Lain - lain</legend>
	Mendapatkan info POLTEKOM dari :<br>
	<table>
		<tr>
			<td colspan="2">
			<?php
			$listinfo=array(1=>"Brosur/ Spanduk",2=>"Sekolah",3=>"Koran",4=>"Teman / Saudara",5=>"Televisi",6=>"Lainnya");
			$jenis_info = explode(",", $jenis_info);
			foreach ($listinfo as $key=>$value){
				if(in_array($key,$jenis_info)){
					echo "<img src='".base_url()."images/checkbox_checked.png'>".$value;
				}else{
					echo "<img src='".base_url()."images/checkbox.png'>".$value;
				}
			}
			?>
			</td>
		</tr>
		  <tr><td colspan="2">&nbsp;</td></tr><tr><td class="field">Info Lainnya</td><td>:&nbsp;<?php echo $info_lainnya?></td></tr></table>
	</table>
	</fieldset>
	<span class="keterangan">
		<p>Formulir pendaftaran ini saya buat dengan sebenar-benarnya, dan apabila ada keterangan yang dipalsukan sya bersedia dituntut secara hukum.</p>
			<table border=0>
			<tr><td width="33%">&nbsp;</td><td>&nbsp;</td>

			<td align="center">
			_________, _______________ 2012<br><br><br><br><br><br><br>
			<?php echo $nama_lengkap?>

			</td></tr></tablen>
	</span>
	</div>
	</body>
</html>

