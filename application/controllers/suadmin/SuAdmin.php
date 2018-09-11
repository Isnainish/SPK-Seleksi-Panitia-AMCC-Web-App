<?php 

	/**
	* 
	*/
	class SuAdmin extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Super Admin') {
				redirect('auth/Auth');
			}
			$this->load->model('m_suadmin');		
		}

		/*SUPER ADMIN*/
		public function index(){
			$data['ProfileSuad'] = $this->m_suadmin->getDetailSuad();

			/*jumlah*/
			$data['jmlkegiatan'] = $this->m_suadmin->getJmlKegiatan();
			$data['jmladmin'] = $this->m_suadmin->getJmlAdmin();

			$this->load->view('suadmin/superadmin',$data);

		}

		/*ubah suadmin*/
		public function UbahSuad(){
			$data['edtsuad'] = $this->m_suadmin->getDataSuad();

			$this->load->view('suadmin/ubah_suadmin',$data);
		}		

		public function editSuad(){

			/*$datauser = array(
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
			);

			$id_user = $this->m_suadmin->updatedtuser($datauser);

			$datasuad = array(
				'id_user' =>$id_user,
				'id_kegiatan' =>'1',
				'id_level' => '1'
			);

			if ($this->m_suadmin->updateSuad($datasuad)) {
				redirect('suadmin/SuAdmin/');
			} else {
				redirect('suadmin/SuAdmin/');
			}*/
		}


		/*DATA KEGIATAN*/
		public function DataKegiatan(){
			$data['allkegiatan'] = $this->m_suadmin->getAllKegiatan();
			$this->load->view('suadmin/data_kegiatan',$data);
		}
		/*tambah kegiatan*/
		public function addDataKegiatan(){
			$data = array(
				'id_kegiatan' => $this->input->post('id_kegiatan'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'tanggal' => $this->input->post('tanggal')
			);

			$this->m_suadmin->addNewKegiatan($data);

			redirect('suadmin/SuAdmin/DataKegiatan');
		}
		/*ubah kegiatan*/
		public function ubahKegiatan($id){
			$where = array('id_kegiatan'=>$id);
			$data['edtKegiatan'] = $this->m_suadmin->getDataKegiatan($where);
			$this->load->view('suadmin/ubah_kegiatan',$data);
		}

		public function doEditKegiatan($id){
			
			$data = array(
				'id_kegiatan' => $id,
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'tanggal' => $this->input->post('tanggal')
			);

			$where = array(
				'id_kegiatan' => $id);

			if ($this->m_suadmin->updateKegiatan($where, $data)) {
				redirect('suadmin/SuAdmin/DataKegiatan');
			} else {
				redirect('suadmin/SuAdmin/DataKegiatan');
			}
		}
		/*hapus kegiatan*/
		public function HapusKegiatan($id_kegiatan){

			$this->m_suadmin->DeleteKegiatan($id_kegiatan);

			redirect('suadmin/SuAdmin/DataKegiatan');
		}

		/*DATA ADMIN*/
		public function DataAdmin(){
			$data['admin'] = $this->m_suadmin->getAllAdmin();

			$this->load->view('suadmin/data_admin',$data);
		}
		/*tambah admin*/
		public function tambahAdmin(){
			$data['kegiatan'] = $this->m_suadmin->getKegiatan();
			$this->load->view('suadmin/tambah_admin',$data);
		}

		public function addAdmin(){
			$datauser = array(
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password')
				);
			$id_user = $this->m_suadmin->insert($datauser);

			$dataduser = array(
				'id_user' =>$id_user,
				'id_kegiatan' =>$this->input->post('id_kegiatan'),
				'id_level' => '2'
			);

			$this->m_suadmin->addAdmin($dataduser);

			redirect('suadmin/Suadmin/DataAdmin');
		}
		/*detail admin*/
		public function DetailAdmin($id){
			$where = array(
				'id_detail_user' => $id
			);
			$data['detail_admin'] = $this->m_suadmin->getDetailAdmin($where);

			$this->load->view('suadmin/detail_admin',$data);
		}	
		/*ubah admin*/
		public function UbahAdmin($id){
			$data['pilih_kegiatan'] = $this->m_suadmin->getKegiatan();
			$where = array(
				'id_detail_user'=>$id,
			);
			$data['edit'] = $this->m_suadmin->getDataAdmin($where);
			$this->load->view('suadmin/ubah_admin',$data);
		}

		public function doEditAdmin($id){

			// $datauser = array(
			// 	'nama' =>$this->input->post('nama'),
			// 	'username' =>$this->input->post('username'),
			// 	'password' =>$this->input->post('password'),
			// );
			// $id_user = $this->m_suadmin->updateuser($datauser);

			// $dataduser = array(
			// 	'id_user' =>$id_user,
			// 	'id_kegiatan' =>$this->input->post('id_kegiatan'),
			// 	'id_level' => '2'
			// );

			// $where = array(
			// 	'id_detail_user' => $id);

			// if ($this->m_suadmin->updateAdmin($where, $dataduser)) {
			// 	redirect('suadmin/SuAdmin/DataAdmin');
			// } else {
			// 	redirect('suadmin/SuAdmin/DataAdmin');
			// }
		}
		/*hapus admin*/
		public function HapusAdmin($id_detail_user){

			// $this->m_suadmin->DeleteAdmin($id_detail_user);

			// redirect('suadmin/SuAdmin/DataAdmin');
		}


		

	}
?>