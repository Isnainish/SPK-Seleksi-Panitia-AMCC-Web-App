<?php 
	/**
	*   
	*/
	class Pendaftar extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model("m_pendaftar");
			
		} 

		public function index()
		{
			$search = $this->session->userdata('search');
			$data['select_option'] = $this->m_pendaftar->getAllKegiatan();
			$data['listPendaftar'] = $this->m_pendaftar->getAllPendaftar($search['id_kegiatan']);
			$this->load->view('admin/datapendaftar/pendaftar', $data);
		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$search['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('search', $search);
			redirect('admin/DataPendaftar/Pendaftar');
		}
		
		/*detail*/
		public function DetailPendaftar($id_pendaftar)
		{
			

			$data['listDetail'] = $this->m_pendaftar->doDetailPendaftar($id_pendaftar);

			$this->load->view('admin/datapendaftar/detail',$data);


		}
		
		/*delete*/
		public function doDeletePendaftar ($id_pendaftar){

			$this->m_pendaftar->doDropPendaftar($id_pendaftar);

			redirect('admin/DataPendaftar/Pendaftar');
		}

		
		
	}
 ?>

 