<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gbulanan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('GbulananModel','Model');
		$this->load->model('KecamatanModel');
		$this->load->model('KategorihotspotModel');
	}

	public function index()
	{
		$datacontent['url']='admin/gbulanan';
		$datacontent['title']='Halaman Grafik Bulanan';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/gbulanan/formView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/gbulanan/js/formJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
}