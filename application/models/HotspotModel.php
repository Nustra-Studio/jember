<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HotspotModel extends CI_Model{
	function get(){
		$data=$this->db->select('*')
					->from('t_hotspot a')
					->join('m_kecamatan b','a.id_kecamatan=b.id_kecamatan','LEFT')
					->join('m_keluhan c','a.id_kategori_keluhan=c.id_kategori_keluhan','LEFT')
					->join('m_kategori_hotspot d','a.id_kategori_hotspot=d.id_kategori_hotspot','LEFT')
					->get();
		return $data;
	}
	public function get_data_by_date_range($startDate, $endDate) {
		$data=$this->db->select('*')
		->from('t_hotspot a')
		->join('m_kecamatan b','a.id_kecamatan=b.id_kecamatan','LEFT')
		->join('m_keluhan c','a.id_kategori_keluhan=c.id_kategori_keluhan','LEFT')
		->join('m_kategori_hotspot d','a.id_kategori_hotspot=d.id_kategori_hotspot','LEFT')
		->where('tanggal >=', $start_date)
		->where('tanggal <=', $end_date)
		->get();
return $data;
    }
	function insert($data=array()){
		$this->db->insert('t_hotspot',$data);
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function insert_batch($data=array()){
		$this->db->insert_batch('t_hotspot',$data);
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->update('t_hotspot',$data);
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function delete($where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete('t_hotspot');
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
	}
}