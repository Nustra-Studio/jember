<?php

class data_model extends CI_Model {
	

	
	function tambahdata($nama_kecamatan,$jml_diare,$tahun)
    {
		$data = array(
        'nama_kecamatan' => $nama_kecamatan,
        'jml_diare' => $jml_diare,
        'tahun' => $tahun
	);

	$this->db->insert('stat', $data);
    }
	
	function selectdata()
    {
		$query = $this->db->get('stat');
		$data= $query->result_array();
		return $data;
    }

    function selectwhere($data)
    {
		$this->db->where('id_data', $data);
		$query = $this->db->get('stat');
		$data= $query->result_array();
		return $data;
    }
	
	function hapusdata($id_data){
		$this->db->where('id_data', $id_data);
		$this->db->delete('stat');
	}

	function rubahdata($data){
		$this->db->set('nama_kecamatan', $data['nama_kecamatan']);
		$this->db->set('jml_diare', $data['jml_diare']);
		$this->db->set('tahun', $data['tahun']);
		$this->db->where('id_data', $data['id_data']);
		$this->db->update('stat'); 
	}

}

?>