<?php 
	/**
	* 
	*/
	class Hasil extends CI_Controller
	{	
		public function index()
		{
			$this->load->view('admin/datahasil/hasil');
		}

		public function hasilakhir(){
			$this->load->view('admin/datahasil/hasilakhir');
		}

	}
 ?>