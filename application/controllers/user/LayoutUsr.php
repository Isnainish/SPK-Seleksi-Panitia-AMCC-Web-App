<?php 

	/**
	* 
	*/
	class LayoutUsr extends CI_Controller
	{

		public function head(){
			$this->load->view('user/layout_user/head');

		}
		public function foot(){
			$this->load->view('user/layout_user/foot');

		}


	}
?>