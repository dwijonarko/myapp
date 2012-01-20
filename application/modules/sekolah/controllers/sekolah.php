<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sekolah extends CI_Controller{
	function __construct(){
		parent::__construct();
	$this->load->model('MSekolah');
	}

	function index(){
		$this->load->view('show');

	}

	function loadDataGrid(){
			  $page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
        $limit = isset($_POST['rows'])?$_POST['rows']:50; // get how many rows we want to have into the grid
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'id'; // get index row - i.e. user click to sort
        $sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction

        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        $start = ($start<0)?0:$start;  // make sure that $start is not a negative value

        $where = ""; //if there is no search request sent by jqgrid, $where should be empty
        if ($_POST['_search'] == 'true') {
            $json_filters = isset($_POST['filters']) ? $_POST['filters']: false;
		        $filters = json_decode($json_filters,true);
		        $groupOp = $filters['groupOp'];
				    foreach($filters['rules'] as $key=> $value) {
					        foreach ($filters['rules'][$key] as $val) {
								    $searchOper=$filters['rules'][$key]['op'];
								    $searchField=$filters['rules'][$key]['field'];
								    $searchString=$filters['rules'][$key]['data'];
								    if($searchOper == 'eq' ) $searchString = $searchString;
				            if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
				            if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
				            if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';
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
				            foreach ($ops as $keyops=>$valueops){
				                if ($searchOper==$keyops) {
			                    $ops = $valueops;
					               }
				            }
					        }
						     $where= $where." $searchField $ops '$searchString' $groupOp";
				    }
				    $length = strlen($where);
				    $lengthOp=strlen($groupOp);
				    $delimiter= substr($where,$length-$lengthOp,$lengthOp);
				    $where = substr_replace($where,"",$length-$lengthOp,$lengthOp);
        }

        if(!$sidx) $sidx =1;
        $count = $this->db->count_all_results('Sekolah'); //get total rows from table

        if( $count > 0 ) {
            $total_pages = ceil($count/$limit);    //calculating total number of pages
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) $page=$total_pages;
        $query = $this->MSekolah->getAllGrid($start,$limit,$sidx,$sord,$where); //add parameter to model

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = "$count";
        $i=0;
        foreach($query as $row) {
            $responce->rows[$i]['id']=$row->id;
            $responce->rows[$i]['cell']=array($row->npsn,$row->nss,$row->nama,$row->jenjang,$row->status,$row->kota,$row->kecamatan,$row->desa,$row->alamat_sekolah,$row->nip_ks,$row->nama_ks,$row->update_status);
            $i++;
        }
        //return $responce;
        echo json_encode($responce);
  }
}