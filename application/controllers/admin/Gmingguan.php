<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gmingguan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('GmingguanModel','Model');
		$this->load->model('KecamatanModel');
		$this->load->model('KategorihotspotModel');
	}

	public function index()
	{
		$datacontent['url']='admin/gmingguan';
		$datacontent['title']='Halaman Grafik Mingguan';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/gmingguan/formView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/gmingguan/js/formJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
}