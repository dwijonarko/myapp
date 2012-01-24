<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->library('pdf');
		/*$file_pdf = */ $this->load->view('welcome_message');//Save as variable
		//$this->pdf->pdf_create($file_pdf,'welcome');
		$this->template
					->set_layout('default') // application/views/layouts/two_col.php
					->build('welcome_message'); // views/welcome_message
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */