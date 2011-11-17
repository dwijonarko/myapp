<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Number{

	function generate_number($format=array()){
		$noprefix=$format['num'];
		$divisi=$format['divisi'];
		$perihal=$format['perihal'];
		$no_last = $noprefix+1;
		$num = str_pad($no_last,4,'0',STR_PAD_LEFT);
		
		if($perihal!=""){
			return $num."/POLTEKOM/".$divisi."/".$perihal."/".date("m.Y");
		}else{
			return $num."/POLTEKOM/".$divisi."/".date("m.Y");
		}
		
	}
}

