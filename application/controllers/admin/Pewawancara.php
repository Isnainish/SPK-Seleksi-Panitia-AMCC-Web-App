<?php 
	/**
	* 
	*/
	class Pewawancara extends CI_Controller
	{
		var $ADMIN = 'Admin';
		
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Admin') {
				redirect('auth/Auth');
			}
			$this->load->model('m_pewawancara');
			
		}		

		public function index(){
			$pilihkegiatan = $this->session->userdata('pilihkegiatan');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['select'] = $this->m_pewawancara->getAllKegiatan();
			$data['listPewawancara'] = $this->m_pewawancara->getAllPewawancara($pilihkegiatan['id_kegiatan']);
			$data['detail_kegiatan'] = count($this->m_pewawancara->getAllDetailKegiatan($pilihkegiatan['id_kegiatan'], $idLevel, $idUser));
			$this->load->view('admin/datapewawancara/data_pewawancara',$data);
		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$pilihkegiatan['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('pilihkegiatan', $pilihkegiatan);
			redirect('admin/Pewawancara');
		}

		/*tambah pewawancara*/
		public function tambahPewawancara(){

			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['pilih_kegiatan'] = $this->m_pewawancara->getKegiatan($idUser, $idLevel);
			// $data['pilih_level'] = $this->m_pewawancara->getLevel();
			$data['pilih_nama'] = $this->m_pewawancara->getNamaUser();

			$this->load->view('admin/datapewawancara/tambah_pewawancara',$data);
		}

		public function addPewawancara() {


			$dataduser = array(
				'id_user' => $this->input->post('id_user'),
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'id_level' => '3'
				);

			$this->m_pewawancara->addNewPewawancara($dataduser);

			redirect('admin/Pewawancara');
		}

		public function tambahPewawancaras(){

			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];
			$data['pilih_kegiatan'] = $this->m_pewawancara->getKegiatan($idUser, $idLevel);
			$data['pilih_level'] = $this->m_pewawancara->getLevel();
			$data['pilih_nama'] = $this->m_pewawancara->getNamaUser();

			$this->load->view('admin/datapewawancara/tambah_pewawancaras',$data);
		}

		public function addPewawancaras() {

			$datauser = array(
				
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
			$id_user = $this->m_pewawancara->insert($datauser);

			$dataduser = array(
				'id_user' => $id_user,
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'id_level' => '3'
				);

			$this->m_pewawancara->addNewPewawancara($dataduser);

			redirect('admin/Pewawancara');
		}


		/*detail pewawancara*/
		public function detailPewawancara($id){
			$where = array(
				'id_detail_user'=> $id
			);
			$data['info_detail'] = $this->m_pewawancara->getInfoDetailPewawancara($where);
			$this->load->view('admin/datapewawancara/detail_pewawancara',$data);
		}

		/*hapus*/
		public function hapusPewawancara($id_detail_user){
			$this->m_pewawancara->DeletePewawancara($id_detail_user);
			redirect('admin/Pewawancara');
		}


	}
?>