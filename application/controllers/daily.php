<?php
class Daily extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('MDaily');
	}

	public function index(){
		$this->load->view('daily/input');
	}
	
	function submit(){
		if ($this->input->post('submit')){
			$this->MDaily->save();
		}
			redirect('daily/index');
		}
	}
?>
