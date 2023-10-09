<?php
class Login extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('login_model');
	}
 
	public function index() 
	{
		$this->load->view("login_view");
	}
 
	public function user()
	{
		$data = $this->login_model->login();
		$datanum = $data->num_rows();
		//echo $datanum;
		$datarow = $data->result_array();

		foreach ($datarow as $row ) {
			$user = $row['username'];
			//echo $user;
		}

		$datasesion = array('user' => $user );

		$this->load->library('session');
	
		if($datanum ==0){
			
			redirect('login?error=gagal');
		}else{
			$this->session->set_userdata($datasesion);
			redirect('admin/beranda');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}


}
