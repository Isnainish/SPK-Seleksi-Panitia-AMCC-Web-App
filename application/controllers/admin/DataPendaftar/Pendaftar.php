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
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['select_option'] = $this->m_pendaftar->getAllKegiatan();
			$data['listPendaftar'] = $this->m_pendaftar->getAllPendaftar($search['id_kegiatan']);
			$data['detail_kegiatan'] = count($this->m_pendaftar->getAllDetailKegiatan($search['id_kegiatan'], $idLevel, $idUser));


			// print_r(count($data['detail_kegiatan']));

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

		/*edit*/
		public function EditPendaftar($id_pendaftar)
		{
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$idKegiatan = $this->session->userdata['auth_session']['id_kegiatan'];
			$data['select_sie'] = $this->m_pendaftar->getSelectSie($idKegiatan);
			
			$data['edtPendaftar'] = $this->m_pendaftar->getPendaftar($id_pendaftar);
			
			$this->load->view('admin/datapendaftar/ubah', $data);
		}

		public function doEditPendaftar($id_pendaftar) 
		{
			$data = array(
				'nama_pendaftar' => $this->input->post('nama_pendaftar'),
				'nim' => $this->input->post('nim'),
				'program_studi' => $this->input->post('program_studi'),
				'alamat' => $this->input->post('alamat'),
				'nomer_hp' => $this->input->post('nomer_hp'),
				'email' => $this->input->post('email'),
				'keahlian' => $this->input->post('keahlian'),
				'pengalaman' => $this->input->post('pengalaman'),
				'motivasi' => $this->input->post('motivasi'),
				'ipk' => $this->input->post('ipk'),
				'posisi1' => $this->input->post('posisi1'),
				'posisi2' => $this->input->post('posisi2')
				
				);


			if ($this->m_pendaftar->updatePendaftar($id_pendaftar, $data)) {
				redirect('admin/DataPendaftar/Pendaftar');
			} else {
				redirect('admin/DataPendaftar/Pendaftar');
			}
		}

		
		/*delete*/
		public function DeletePendaftar ($id_pendaftar){

			$this->m_pendaftar->doDropPendaftar($id_pendaftar);

			redirect('admin/DataPendaftar/Pendaftar');
		}

		
		
	}
 ?>

 