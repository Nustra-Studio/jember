<?php
class Poli extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('polimodel','Model');
	}

	public function index()
	{
		$datacontent['url']='admin/poli';
		$datacontent['title']='Data Poli';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/poli/politable',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}

	public function form($parameter='',$id='')
	{
		$datacontent['url']='admin/poli';
		$datacontent['parameter']=$parameter;
		$datacontent['id_poli']=$id;
		$datacontent['title']='Form Poli';
		$data['content']=$this->load->view('admin/poli/poliform',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	
	public function simpan()
	{
		if($this->input->post()){

			// cek validasi
			$validation=null;
			// cek kode apakah sudah ada
			if($this->input->post('id_poli')!=""){
				$this->db->where('id_poli !='.$this->input->post('id_poli'));
			}
			$this->db->where('nama_poli',$this->input->post('nama_poli'));
			$check=$this->db->get('p_poli');
			if($check->num_rows()>0){
				$validation[]='Poli Sudah Ada';
			}

			if($this->input->post('nama_poli')==''){
				$validation[]='Nama Poli Tidak Boleh Kosong';
			}


			if(count($validation)>0){
				$this->session->set_flashdata('error_validation',$validation);
				$this->session->set_flashdata('error_value',$_POST);
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}
			// cek validasi



			$data=[
				'id_poli'=>$this->input->post('id_poli'),
				'nama_poli'=>$this->input->post('nama_poli'),
			];
			}
			// upload
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_poli'=>$this->input->post('id_poli')]);
			}

		}

	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_poli',$id);
		$get=$this->Model->get()->row();
		// end hapus file di dalam folder
		$this->Model->delete(["id_poli"=>$id]);
		redirect('admin/poli');
	}
}