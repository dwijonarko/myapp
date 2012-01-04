<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nomor extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->model('MNomor');
		$data['divisi']=$this->MNomor->get_list_divisi();
		$this->load->view('nomor/index.php',$data);
		//echo $data;
	}

	public function submit(){
		$this->load->library('number');
		if($this->input->post('ajax')){
			$num = 99;

			$format['num']=$num;//hasil query aja
			$format['divisi']=$this->input->post('divisi');
			$format['perihal']=$this->input->post('perihal');
			$nomor_surat = $this->number->generate_number($format);
			echo "Nomor Surat :".$nomor_surat;
			echo "<br>";
		}
	}

}

