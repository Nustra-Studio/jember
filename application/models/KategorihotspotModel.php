<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategorihotspotModel extends CI_Model{
	function get(){
		$data=$this->db->get('m_kategori_hotspot');
		return $data;
	}    public function get_name_by_id($id) {
        $this->db->select('nm_kategori_hotspot');
        $this->db->where('id_kategori_hotspot', $id);
        $query = $this->db->get('m_kategori_hotspot');

        if ($query->num_rows() > 0) {
            return $query->row()->nm_kategori_hotspot;
        } else {
            return null;
        }
    }
	function insert($data=array()){
		$this->db->insert('m_kategori_hotspot',$data);
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->update('m_kategori_hotspot',$data);
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function delete($where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete('m_kategori_hotspot');
		$info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
	}
}