<?php
class Login_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
 
	public function login() {
 
		$username = $this->input->POST('username', TRUE);
		$password_baru = $this->input->POST('password_baru', TRUE);
		$data = $this->db->query("SELECT * from user where username='$username' and password='$password' LIMIT 1 ");
		return $data;
	}
 
}