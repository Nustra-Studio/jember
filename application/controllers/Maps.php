<?php
class Maps extends CI_Controller {
	function __construct() {
	parent::__construct();
}
	function index(){
	$this->load->view('header_view');
	$this->load->view('maps_view');
	$this->load->view('footer_view');
	}
}