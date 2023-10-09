<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GbulananModel extends CI_Model{
	function get(){
		$data=$this->db->select('*')
					->from('t_hotspot a')
					->join('m_kecamatan b','a.id_kecamatan=b.id_kecamatan','LEFT')
					->join('m_kategori_hotspot c','a.id_kategori_hotspot=c.id_kategori_hotspot','LEFT')
					->get();
		return $data;
	}
}