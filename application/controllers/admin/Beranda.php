<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('beranda_model');
	}

	public function index()
	{
		$datacontent['title']='';
		$data['kecamatan'] = $this->beranda_model->hitungJumlahKecamatan();
		$data['hotspot'] = $this->beranda_model->hitungJumlahHotspot();
		$data['keluhan'] = $this->beranda_model->hitungJumlahKeluhan();
		$data['user'] = $this->beranda_model->hitungJumlahUser();
		$data['content']=$this->load->view('admin/berandaView',$datacontent,TRUE);
		$data['title']='Selamat Datang di Beranda';
		$this->load->view('admin/layouts/html',$data);
	}
}
