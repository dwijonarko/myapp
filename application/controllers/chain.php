<?php
class Chain extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('MChain');
	}

	function index(){

        $data['option_propinsi'] = $this->MChain->getPropinsiList();
        $this->load->view('chain/index',$data);
    }

    function select_kota(){
        $data['option_kota'] = $this->MChain->getKotaList();
        $this->load->view('chain/kota',$data);
    }

    function select_kecamatan(){
        $data['option_kecamatan'] = $this->MChain->getKecamatanList();
        $this->load->view('chain/kecamatan',$data);
    }
}

