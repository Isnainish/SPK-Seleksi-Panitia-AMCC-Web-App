<?php 
	/**
	* wkwkwkwkw
	*/
	class Beranda extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model('m_beranda');
			
		}

		public function index(){
			$data['admin'] = $this->m_beranda->getDataAdmin();

			$where = $this->session->userdata['auth_session']['id_user'];

			$data['detail_admin'] = $this->m_beranda->getDetailAdmin($where);

			$this->load->view('admin/berandaadmin/data_admin',$data);
		}	

		public function ubahAdmin($id_kegiatan, $id_user){
			
			$data['profil'] = $this->m_beranda->getAdmin($id_kegiatan,$id_user);
			
			$this->load->view('admin/berandaadmin/ubah_admin', $data);
		}

		public function doEditAdmin($id_detail_user){
			
			$datadetuser = array(
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'tanggal' => $this->input->post('tanggal')
			);

			$datauser = array(
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password')
			);


			if ($this->m_beranda->updateAdmin($id_detail_user,$datadetuser,$datauser)) {
				redirect('admin/Beranda');
			} else {
				redirect('admin/Beranda');
			}
		}	

	}
?>