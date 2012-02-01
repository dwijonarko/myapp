<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pmb extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mpmb');
				$this->load->library('ion_auth');
	}

	public function index(){
		$data = $this->mpmb->general();
		$this->load->view('input_data',$data);
	}

	public function submit(){
		if($this->input->post('submit')){
			$this->mpmb->validate();
			if ($this->form_validation->run() == TRUE){
				$this->mpmb->save();
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
			$output=$this->load->view('pmb/view_data',$data,TRUE);

			//echo $output;
			//$this->pdf->pdf_create($output,'form_pmb_'.$data['no_pendaftaran'],true);

		}else{
			redirect(redirect(site_url().'/pmb','refresh'));
		}
	}

	public function form(){
			$data = $this->mpmb->general();
			$output=$this->load->view('pmb/form',$data,TRUE);

			//echo $output;
			$this->pdf->pdf_create($output,'form_pmb_',true);
	}

	public function admin(){
		if ($this->ion_auth->logged_in()){
							$this->template
					->title('POLTEKOM', 'Daftar Calon Mahasiswa Baru')
					->set(array('header' => 'Daftar Calon Mahasiswa Baru'))
					->set_layout('sekolah') // application/views/layouts/two_col.php
					->build('show'); // views/welcome_message
		}else{
			redirect('auth/login');
		}
	}

		function loadDataGrid(){
		if ($this->ion_auth->logged_in()){
			  $page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
	$limit = isset($_POST['rows'])?$_POST['rows']:30; // get how many rows we want to have into the grid
	$sidx = isset($_POST['sidx'])?$_POST['sidx']:'id'; // get index row - i.e. user click to sort
	$sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

	$start = $limit*$page - $limit; // do not put $limit*($page - 1)
	$start = ($start<0)?0:$start;  // make sure that $start is not a negative value

	$where = ""; //if there is no search request sent by jqgrid, $where should be empty
	$searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
	$searchOper = isset($_POST['searchOper']) ? $_POST['searchOper']: false;
	$searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

	if ($_POST['_search'] == 'true') {
	    $ops = array(
	    'eq'=>'=', //equal
	    'ne'=>'<>',//not equal
	    'lt'=>'<', //less than
	    'le'=>'<=',//less than or equal
	    'gt'=>'>', //greater than
	    'ge'=>'>=',//greater than or equal
	    'bw'=>'LIKE', //begins with
	    'bn'=>'NOT LIKE', //doesn't begin with
	    'in'=>'LIKE', //is in
	    'ni'=>'NOT LIKE', //is not in
	    'ew'=>'LIKE', //ends with
	    'en'=>'NOT LIKE', //doesn't end with
	    'cn'=>'LIKE', // contains
	    'nc'=>'NOT LIKE'  //doesn't contain
	    );

	    foreach ($ops as $key=>$value){
		if ($searchOper==$key) {
		    $ops = $value;
		}
	    }
	    if($searchOper == 'eq' ) $searchString = $searchString;
	    if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
	    if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
	    if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

	    $where = "$searchField $ops '$searchString' "; //create where parameter for search data
	}

	if(!$sidx) $sidx =1;
	$count = $this->db->count_all_results('mahasiswa_baru'); //get total rows from table

	if( $count > 0 ) {
	    $total_pages = ceil($count/$limit);    //calculating total number of pages
	} else {
	    $total_pages = 0;
	}

	if ($page > $total_pages) $page=$total_pages;
	$query = $this->mpmb->getAllGrid($start,$limit,$sidx,$sord,$where); //add parameter to model

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = "$count";
	$i=0;
	foreach($query as $row) {
	    $responce->rows[$i]['id']=$row->id;
	    $responce->rows[$i]['cell']=array($row->no_pendaftaran,$row->nama_lengkap,$row->no_telp,$row->pilihan_1,$row->asal_sekolah);
	    //$responce->rows[$i]['cell']=array("1","2","3","4");
	    $i++;
	}
	//return $responce;
	echo json_encode($responce);
		}else{
			redirect('auth/login');
		}
  }
}
