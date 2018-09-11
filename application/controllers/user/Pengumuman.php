<?php 
	/**
	* 
	*/
	class Pengumuman extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Pewawancara') {
				redirect('auth/Auth');
			}
			$this->load->model("m_hasil");
		}
		
		public function index(){
			$data['pengumuman'] = $this->m_hasil->getHasilRangking();
			
			$this->load->view('user/pengumuman',$data);

		}
	}
?>