<?php
class MNomor extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function get_list_divisi(){
		$result = array();
        $this->db->select('*');
        $this->db->from('divisi');
        $this->db->order_by('nama_divisi','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Divisi-';
            $result[$row->id_divisi]= $row->nama_divisi;
        }

        return $result;
	}
}