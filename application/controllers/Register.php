<?php 

class Register extends CI_Controller {

    public function __construct()   {
    parent::__construct();
        $this->load->helper("url");
        $this->load->model('register_model');
    }   

    public function index(){
    $this->load->view('register_view');
    }

    public function register_user(){
        $nip=$this->input->post('nip');
        $nama=$this->input->post('nama');
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $password=$this->input->post('password_baru');
        
        $data = array (
            'nip'=> $nip,
            'nama'=> $nama,
            'username'=> $username,
            'email'=> $email,
            'password_baru'=> $password
        );

        $this->register_model->inputdata($data,'user');
        redirect('index');      
    }
}