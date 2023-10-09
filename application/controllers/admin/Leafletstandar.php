<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leafletstandar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('HotspotModel');
		$this->load->model('KecamatanModel');
	}

	public function index()
	{
		$datacontent['url']='admin/leafletstandar';
		$datacontent['title']='Peta 10 Besar Penyakit';
		// $datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/leafletstandar/mapView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/leafletstandar/js/mapJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
}
