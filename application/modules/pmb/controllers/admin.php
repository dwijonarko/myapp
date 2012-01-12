<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
	}

	function index(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}else{
			echo $this->session->userdata('group');
		}
	}

	function view_data(){
	if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}else{
			echo "tampil data";
		}
	}
}