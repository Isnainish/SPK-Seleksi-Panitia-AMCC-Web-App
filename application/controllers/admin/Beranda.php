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


			$this->load->view('admin/berandaadmin/data_admin',$data);
		}	

		public function ubahAdmin($id){

			$where = array('id_detail_user'=>$id);
			$data['profil'] = $this->m_beranda->getAdmin($where);
			$this->load->view('admin/berandaadmin/ubah_admin', $data);
		}

		public function doEditAdmin($id){
			// $data = array(
			// // 	'nama' => $this->input->post('nama'),
			// // 	'username' => $this->input->post('username'),
			// // 	'password' => $this->input->post('password')
				
			// // 	);

			// // $where = array('id_user' => $id);

			// // if ($this->m_beranda->doUpdateAdmin($where, $data)) {
			// // 	redirect('admin/Beranda');
			// // } else {
			// // 	redirect('admin/Beranda');
			// // }
		}	

	}
?>