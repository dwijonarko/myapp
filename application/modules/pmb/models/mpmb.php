<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mpmb extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function general(){
		$data['header']		= "FORMULIR";
		$data['subheader'] 	= "PENDAFTARAN MAHASISWA BARU <br> POLITEKNIK KOTA MALANG";
		$data['no_dokumen']	= "FRM.BAAK.05.01.00";
		$data['tanggal']	= "04-01-2012";
		$data['revisi']		= "-";
		$data['halaman']	= "1";
		$data['jurusan']	= array(
								"-"=>"--Pilih jurusan--",
								"TI"=>"Teknik Informatika",
								"TM"=>"Teknik Mekatronika",
								"TT"=>"Teknik Telekomunikasi"
		);
		$data['jurusan_sma']= array(
								"-"=>"--Pilih Jurusan--",
								"IPA"=>"IPA",
								"IPS"=>"IPS",
								"lainnya"=>"Lainnya"
		);
		$data['agama']		= array(
								"ISLAM" => "ISLAM",
								"KRISTEN"=> "KRISTEN",
								"KATOLIK"=> "KATOLIK",
								"HINDU"=>"HINDU",
								"BUDHA"=>"BUDHA",
								"LAIN"	=>"LAINNYA"
		);

		for ($i=1;$i<=31;$i++){
			$data['date'][$i]=$i;
		}

		$data['month']=array(
								"Januari"=>"Januari",
								"Februari"=>"Februari",
								"Maret"=>"Maret",
								"April"=>"April",
								"Mei"=>"Mei",
								"Juni"=>"Juni",
								"Juli"=>"Juli",
								"Agustus"=>"Agustus",
								"September"=>"September",
								"Oktober"=>"Oktober",
								"November"=>"November",
								"Desember"=>"Desember"
		);

		for ($i=1980;$i<=1995;$i++){
			$data['year'][$i]=$i;
		}


		$data['input_no_pendaftaran']	= array('name'=>'no_pendaftaran','size'=>30,'class'=>'input','value'=>set_value('no_pendaftaran'));
		$data['input_nama_lengkap']		= array('name'=>'nama_lengkap','size'=>50,'class'=>'input','value'=>set_value('nama_lengkap'));
		$data['input_tempat_lahir']		= array('name'=>'tempat_lahir', 'size'=>50,'class'=>'input','value'=>set_value('tempat_lahir'));
		$data['input_asal_sekolah']		= array('name'=>'asal_sekolah', 'size'=>50,'class'=>'input','value'=>set_value('asal_sekolah'));
		$data['input_tahun_lulus']		= array('name'=>'tahun_lulus', 'size'=>20,'class'=>'input','value'=>set_value('tahun_lulus'));
		$data['input_nun']				= array('name'=>'nilai_un','size'=>15,'class'=>'input','value'=>set_value('nilai_un'));
		$data['input_alamat_asal']		= array('name'=>'alamat_asal', 'rows'=>5,'cols'=>100,'class'=>'input','value'=>set_value('alamat_asal'));
		$data['input_alamat_sekarang']	= array('name'=>'alamat_sekarang', 'rows'=>5,'cols'=>100,'class'=>'input','value'=>set_value('alamat_sekarang'));
		$data['input_no_telp']			= array('name'=>'no_telp', 'size'=>20,'class'=>'input','value'=>set_value('no_telp'));
		$data['input_email']			= array('name'=>'email', 'size'=>50,'class'=>'input','value'=>set_value('email'));
		$data['input_nama_ayah']		= array('name'=>'nama_ayah', 'size'=>50,'class'=>'input','value'=>set_value('nama_ayah'));
		$data['input_nama_ibu']			= array('name'=>'nama_ibu', 'size'=>50,'class'=>'input','value'=>set_value('nama_ibu'));
		$data['input_pekerjaan_ayah']	= array('name'=>'pekerjaan_ayah', 'size'=>50,'class'=>'input','value'=>set_value('pekerjaaan_ayah'));
		$data['input_pekerjaan_ibu']	= array('name'=>'pekerjaan_ibu', 'size'=>50,'class'=>'input','value'=>set_value('pekerjaan_ibu'));
		$data['input_alamat_orang_tua']	= array('name'=>'alamat_orang_tua', 'rows'=>5,'cols'=>100,'class'=>'input','value'=>set_value('alamat_orang_tua'));
		$data['input_no_telp_orang_tua']= array('name'=>'no_telp_orang_tua', 'size'=>20,'class'=>'input','value'=>set_value('no_telp_orang_tua'));
		$data['input_jenis_kelamin']	= array('name'=>'jenis_kelamin','class'=>'input');
		$data['input_jenis_biaya']		= array('name'=>'jenis_biaya[]','class'=>'input');
		$data['input_jenis_info']		= array('name'=>'jenis_info[]','class'=>'input');
		$data['input_biaya_lainnya']	= array('name'=>'biaya_lainnya', 'size'=>50,'class'=>'input','value'=>set_value('biaya_lainnya'));
		$data['input_info_lainnya']		= array('name'=>'info_lainnya', 'size'=>50,'class'=>'input','value'=>set_value('info_lainnya'));

		return $data;
	}

	function validate(){
		$config = array(
				array(
							'field'   => 'pilihan_1', 
							'label'   => 'Pilihan 1', 
							'rules'   => 'exact_length[2]',
				),
				array(
							'field'   => 'pilihan_2', 
							'label'   => 'Pilihan 2', 
							'rules'   => 'exact_length[2]',
				),
				array(
							'field'   => 'pilihan_3', 
							'label'   => 'Pilihan 3', 
							'rules'   => 'exact_length[2]',
				),
				array(
							'field'   => 'nama_lengkap', 
						    'label'   => 'Nama Lengkap', 
						    'rules'   => 'required',
				),
				array(
							'field'   => 'jenis_kelamin', 
						    'label'   => 'Jenis kelamin', 
						    'rules'   => 'required',
				),
				array(
							'field'   => 'tempat_lahir', 
							'label'   => 'Tempat Lahir', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'tanggal', 
							'label'   => 'tanggal', 
							'rules'   => '',
				),
				array(
							'field'   => 'bulan', 
							'label'   => 'bulan', 
							'rules'   => '',
				),
				array(
							'field'   => 'tahun', 
							'label'   => 'tahun', 
							'rules'   => '',
				),
				array(
							'field'   => 'agama', 
							'label'   => 'agama', 
							'rules'   => '',
				),
				array(
							'field'   => 'alamat_asal', 
							'label'   => 'Alamat Asal', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'alamat_sekarang', 
							'label'   => 'Alamat Sekarang', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'no_telp', 
							'label'   => 'Nomor Telepon / HP', 
							'rules'   => 'required|alpha_dash',
				),
				array(
							'field'   => 'email', 
							'label'   => 'Email', 
							'rules'   => 'required|valid_email',
				),
				array(
							'field'   => 'asal_sekolah', 
							'label'   => 'Asal Sekolah', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'tahun_lulus', 
							'label'   => 'Tahun Lulus', 
							'rules'   => 'required|numeric|min_length[4]|max_length[4]',
				),
				array(
							'field'   => 'jurusan_sma', 
							'label'   => 'Jurusan SMA', 
							'rules'   => '',
				),
				array(
							'field'   => 'nilai_un', 
							'label'   => 'Nilai UN', 
							'rules'   => 'required|min_length[2]|max_length[5]',
				),
				array(
							'field'   => 'nama_ayah', 
							'label'   => 'Nama Ayah / Wali', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'pekerjaan_ayah', 
							'label'   => 'Pekerjaan Ayah / Wali', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'nama_ibu', 
							'label'   => 'Nama Ibu / Wali', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'pekerjaan_ibu', 
							'label'   => 'Pekerjaan Ibu / Wali', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'alamat_orang_tua', 
							'label'   => 'Alamat Orang Tua / Wali', 
							'rules'   => 'required',
				),
				array(
							'field'   => 'no_telp_orang_tua', 
							'label'   => 'Nomor Telepon / HP orang tua / Wali', 
							'rules'   => 'required|alpha_dash',
				),
				array(
							'field'   => 'jenis_biaya', 
							'label'   => 'Jenis Biaya', 
							'rules'   => '',
				),
				array(
							'field'   => 'jenis_info', 
							'label'   => 'Jenis Info', 
							'rules'   => '',
				),
				array(
							'field'   => 'biaya_lainnya', 
							'label'   => 'biaya_lainnya', 
							'rules'   => '',
				),
				array(
							'field'   => 'info_lainnya', 
							'label'   => 'info_lainnya', 
							'rules'   => '',
				),

		);
		$this->form_validation->set_message('required', '%s wajib diisi');
		$this->form_validation->set_message('min_length', '%s minimal 2 karakter');
		$this->form_validation->set_message('exact_length', 'Pilih jurusan dahulu');
		return $this->form_validation->set_rules($config);

	}

	function save(){
		echo $this->input->post('pilihan_1')."<br>";
		echo $this->input->post('pilihan_2')."<br>";
		echo $this->input->post('pilihan_3')."<br>";
		echo $this->input->post('nama_lengkap')."<br>";
		echo $this->input->post('jenis_kelamin')."<br>";
		echo $this->input->post('tempat_lahir')."<br>";
		echo $this->input->post('tanggal')."-";
		echo $this->input->post('bulan')."-";
		echo $this->input->post('tahun')."<br>";
		echo $this->input->post('agama')."<br>";
		echo $this->input->post('alamat_asal')."<br>";
		echo $this->input->post('alamat_sekarang')."<br>";
		echo $this->input->post('no_telp')."<br>";
		echo $this->input->post('email')."<br>";
		echo $this->input->post('asal_sekolah')."<br>";
		echo $this->input->post('tahun_lulus')."<br>";
		echo $this->input->post('jurusan_sma')."<br>";
		echo $this->input->post('nilai_un')."<br>";
		echo $this->input->post('nama_ayah')."<br>";
		echo $this->input->post('pekerjaan_ayah')."<br>";
		echo $this->input->post('nama_ibu')."<br>";
		echo $this->input->post('pekerjaan_ibu')."<br>";
		echo $this->input->post('alamat_orang_tua')."<br>";
		echo $this->input->post('no_telp_orang_tua')."<br>";
		$jenis_biaya = $this->input->post('jenis_biaya');
		$biaya = implode(",",$jenis_biaya);
		echo $biaya."<br>";
		echo $this->input->post('biaya_lainnya')."<br>";
		$jenis_info = $this->input->post('jenis_info');
		$info = implode(",",$jenis_info);
		echo $info."<br>";
		echo $this->input->post('info_lainnya')."<br>";
	}
}