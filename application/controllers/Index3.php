<?php
class Index3 extends CI_Controller {
	public function __construct() {
	parent::__construct();
}
	public function index(){
	$this->load->view('header_view');
	$this->load->view('index3_view');
	$this->load->view('footer_view');

	}

}