<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		// echo "ini method index pada controller belajar";
		$this->load->view('home/index');
	}
}