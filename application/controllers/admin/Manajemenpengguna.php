<?php
class Manajemenpengguna extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('manajemenpengguna_model','Model');
	}

	public function index()
	{
		$datacontent['url']='admin/manajemenpengguna';
		$datacontent['title']='Halaman User';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/manajemenpengguna/manajemenpenggunatable',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}

	public function form($parameter='',$id='')
	{
		$datacontent['url']='admin/manajemenpengguna';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form User';
		$data['content']=$this->load->view('admin/manajemenpengguna/manajemenpenggunaform',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	
	public function simpan()
	{
		if($this->input->post()){

			// cek validasi
			$validation=null;
			// cek kode apakah sudah ada
			if($this->input->post('id')!=""){
				$this->db->where('id !='.$this->input->post('id'));
			}
			$this->db->where('nip',$this->input->post('nip'));
			$check=$this->db->get('user');
			if($check->num_rows()>0){
				$validation[]='NIP Sudah Ada';
			}

			if($this->input->post('username')==''){
				$validation[]='Username Tidak Boleh Kosong';
			}

			if(count($validation)>0){
				$this->session->set_flashdata('error_validation',$validation);
				$this->session->set_flashdata('error_value',$_POST);
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}
			// cek validasi



			$data=[
				'id'=>$this->input->post('id'),
				'nip'=>$this->input->post('nip'),
				'nama'=>$this->input->post('nama'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
				'level'=>$this->input->post('level'),
			];
			}
			// upload
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id'=>$this->input->post('id')]);
			}

		}

	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id',$id);
		$get=$this->Model->get()->row();
		// end hapus file di dalam folder
		$this->Model->delete(["id"=>$id]);
		redirect('admin/manajemenpengguna');
	}
}