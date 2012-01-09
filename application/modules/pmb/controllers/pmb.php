<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pmb extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mpmb');
	}
	
	public function index(){
		$data = $this->mpmb->general();
		$this->load->view('input_data',$data);	
	}
	
	public function submit(){
		if($this->input->post('submit')){
			$this->mpmb->validate();
			if ($this->form_validation->run() == TRUE){
				//$this->mpmb->save();
				redirect(site_url().'/pmb/success/'.$this->input->post('no_pendaftaran'));
			}else{
				$data = $this->mpmb->general();
				$this->load->view('input_data',$data);
			}
		}else{
			redirect(site_url().'/pmb','refresh');
		}
	}
	
	public function success($no_pendaftaran){
		if(ISSET($no_pendaftaran)){
			$data = $this->mpmb->get_mahasiswa($no_pendaftaran); 
			$this->load->view('pmb/show',$data);
			
		}else{
			redirect(redirect(site_url().'/pmb','refresh'));
		}
	}
}