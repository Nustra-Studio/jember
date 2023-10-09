<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gtahunan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('GtahunanModel','Model');
		$this->load->model('KecamatanModel');
		$this->load->model('KategorihotspotModel');
	}

	public function index()
	{
		$datacontent['url']='admin/gtahunan';
		$datacontent['title']='Halaman Grafik Tahunan';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/gtahunan/formView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/gtahunan/js/formJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
}