<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pmb extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->model('mpmb');
		$data = $this->mpmb->general();
		$this->load->view('input_data',$data);	
	}
	
	public function submit(){
		if($this->input->post('submit')){
			$this->load->model('mpmb');
			$this->mpmb->save();
		}else{
			redirect(site_url().'/pmb','refresh');
		}
	}
}