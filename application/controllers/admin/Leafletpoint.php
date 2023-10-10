<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leafletpoint extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->db->like('t_hotspot','tanggal');
		$this->load->model('HotspotModel');
		$this->load->model('KecamatanModel');
	}

	public function index()
	{
		$date = $this->input->get('date');
		if(!empty($date)){
		$datacontent['url_kategorihotspot']="admin/api/data/kategorihotspot?date=$date";
		$datacontent['url_kecamatan']="admin/api/data/kecamatan?date=$date";
		$datacontent['date']="$date";
		}
		$datacontent['url_kategorihotspot']="admin/api/data/kategorihotspot";
		$datacontent['url_kecamatan']="admin/api/data/kecamatan";
		$datacontent['url']="admin/leafletpoint";
		$datacontent['date']="";
		$datacontent['title']="Peta Kunjungan Pasien";
		// $datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/leafletpoint/mapView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/leafletpoint/js/mapJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
}
