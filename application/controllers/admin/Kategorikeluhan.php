<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorikeluhan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('KategorikeluhanModel','Model');
	}

	public function index()
	{
		$datacontent['url']='admin/kategorikeluhan';
		$datacontent['title']='Halaman Kategori Keluhan';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/kategorikeluhan/tableView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function form($parameter='',$id='')
	{
		$datacontent['url']='admin/kategorikeluhan';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form Kategori Keluhan';
		$data['content']=$this->load->view('admin/kategorikeluhan/formView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/kategorikeluhan/js/formJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function simpan()
	{
		if($this->input->post()){
			$data=[
				'id_kategori_keluhan'=>$this->input->post('id_kategori_keluhan'),
				'kd_kategori_keluhan'=>$this->input->post('kd_kategori_keluhan'),
				'nm_kategori_keluhan'=>$this->input->post('nm_kategori_keluhan')
			];
			// upload
			if($_FILES['marker_keluhan']['name']!=''){
				$upload=upload('marker','marker','image');
				if($upload['info']==true){
					$data['marker_keluhan']=$upload['upload_data']['file_name'];
				}
				elseif($upload['info']==false){
					$info='<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> '.$upload['message'].' </div>';
					$this->session->set_flashdata('info',$info);
					redirect('admin/kategorikeluhan');
					exit();
				}
			}
			// upload
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_kategori_keluhan'=>$this->input->post('id_kategori_keluhan')]);
			}

		}
		redirect('admin/kategorikeluhan');
	}

	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_kategori_keluhan',$id);
		$get=$this->Model->get()->row();
		$marker=$get->marker;
		unlink('assets/unggah/marker/'.$marker);
		// end hapus file di dalam folder
		$this->Model->delete(["id_kategori_keluhan"=>$id]);
		redirect('admin/kategorikeluhan');
	}
}
