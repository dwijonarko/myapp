<?php
class MDaily extends CI_Model{
	//function __construct()	{
		//parent:: __construct();
	//}
	 
	function save(){
		$date = $this->input->post('date');
		$name = $this->input->post('name');
		$amount=$this->input->post('amount');
		$data = array(
			'date'=>$date,
			'name'=>$name,
			'amount'=>$amount
		);
		$this->db->insert('daily',$data);
	}
 
}

