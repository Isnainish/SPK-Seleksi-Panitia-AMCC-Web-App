<?php 
	/**
	* 
	*/
	class Pewawancara extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata['auth_session']['level'] == 'Pewawancara') {
				redirect('auth/Auth');
			}
			$this->load->model("m_user");
			$this->load->model("m_kriteria");
		}
		
		public function index(){

			$this->load->view('user/pewawancara');
		}

		public function UbahPewawancara($id_user){;

			$data['edtPewawancara'] = $this->m_user->getPewawancara($id_user);
			
			$this->load->view('user/ubah_pewawancara',$data);
		}

		public function doEditPewawancara($id_user){
			$datauser = array(
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password')
			);


			if ($this->m_user->updatePewawancara($id_user, $datauser)) {
				redirect('user/Pewawancara');
			} else {
				redirect('user/Pewawancara');
			}
		}

		/*daftar pendaftar*/
		public function DataPendaftar(){
			$draftnama = $this->session->userdata('draftnama');
			$idLevel = $this->session->userdata['auth_session']['id_level'];
			$idUser = $this->session->userdata['auth_session']['id_user'];

			$data['namakegiatan'] = $this->m_user->getKegiatan($idUser,$idLevel);

			$data['draftPendaftar'] = $this->m_user->getDraftPendaftar($draftnama['id_kegiatan']);
			
			$this->load->view('user/draft_pendaftar',$data);

		}

		/*filter kegiatan*/
		public function doSearchKegiatanP(){
			$draftnama['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('draftnama', $draftnama);
			redirect('user/Pewawancara/DataPendaftar');
		}

		/*kriteria kegiatan*/
		public function Kriteria(){
			$select = $this->session->userdata('select');
			$data['kegiatan'] = $this->m_user->getAllKegiatan();

			$data['draftKriteria'] = $this->m_kriteria->getAllKriteria();
			$this->load->view('user/kriteria',$data);

		}

		/*filter kegiatan*/
		public function doSearchKegiatanK(){
			$select['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('select', $select);
			redirect('user/Pewawancara/Kriteria');
		}

		/*penilaian*/
		/*detail*/
		public function Penilaian($id_kegiatan,$id_pendaftar){
			
			$data['id_kegiatan'] = $id_kegiatan;
			$data['id_pendaftar'] = $id_pendaftar;

			$data['draftPenilaian'] = $this->m_user->getDetailPenilaian($id_kegiatan,$id_pendaftar);
			
			$this->load->view('user/penilaian',$data);
		}
		
		

		public function addPenilaian($id_kegiatan,$id_pendaftar){
		/*input nilai pendaftar*/
			$c1 = $this->input->post('c1'); //c1 = nilai attitude
			$c2 = $this->input->post('c2'); //c2 = nilai loyalitas
			$c3 = $this->input->post('c3'); //c3 = nilai kerjasama
			$c4 = $this->input->post('c4'); //c4 = nilai keahlian
			$c5 = $this->input->post('c5'); //c5 = nilai pengalaman
			$c6 = $this->input->post('c6'); //c6 = nilai motivasi
			$c7 = $this->input->post('c7'); //c7 = nilai ipk

		/*mencocokkan nilai pendaftar dengan nilai himpunan pada setiap kriteria*/
			if ($c1 <= 40) {
				$c1 = 1;
			}else if($c1 >= 41 && $c1 <= 50){
				$c1 = 2;
			}else if($c1 >= 51 && $c1 <= 70){
				$c1 = 3;
			}else if($c1 >= 71 && $c1 <= 90){
				$c1 = 4;
			}else if($c1 >= 91 && $c1 <= 100){
				$c1 = 5;
			}
			if ($c2 <= 40) {
				$c2 = 1;
			}else if($c2 >= 41 && $c2 <= 50){
				$c2 = 2;
			}else if($c2 >= 51 && $c2 <= 70){
				$c2 = 3;
			}else if($c2 >= 71 && $c2 <= 90){
				$c2 = 4;
			}else if($c2 >= 91 && $c2 <= 100){
				$c2 = 5;
			}
 			if ($c3 <= 40) {
				$c3 = 1;
			}else if($c3 >= 41 && $c3 <= 50){
				$c3 = 2;
			}else if($c3 >= 51 && $c3 <= 70){
				$c3 = 3;
			}else if($c3 >= 71 && $c3 <= 90){
				$c3 = 4;
			}else if($c3 >= 91 && $c3 <= 100){
				$c3 = 5;
			}
			if ($c4 <= 40) {
				$c4 = 1;
			}else if($c4 >= 41 && $c4 <= 50){
				$c4 = 2;
			}else if($c4 >= 51 && $c4 <= 70){
				$c4 = 3;
			}else if($c4 >= 71 && $c4 <= 90){
				$c4 = 4;
			}else if($c4 >= 91 && $c4 <= 100){
				$c4 = 5;
			}
			if ($c5 <= 40) {
				$c5 = 1;
			}else if($c5 >= 41 && $c5 <= 50){
				$c5 = 2;
			}else if($c5 >= 51 && $c5 <= 70){
				$c5 = 3;
			}else if($c5 >= 71 && $c5 <= 90){
				$c5 = 4;
			}else if($c5 >= 91 && $c5 <= 100){
				$c5 = 5;
			}
			if ($c6 <= 40) {
				$c6 = 1;
			}else if($c6 >= 41 && $c6 <= 50){
				$c6 = 2;
			}else if($c6 >= 51 && $c6 <= 70){
				$c6 = 3;
			}else if($c6 >= 71 && $c6 <= 90){
				$c6 = 4;
			}else if($c6 >= 91 && $c6 <= 100){
				$c6 = 5;
			}
			if ($c7 <= 1.99) {
				$c7 = 1;
			}else if($c7 >=2.00 && $c7 <= 2.49){
				$c7 = 2;
			}else if($c6 >= 2.50 && $c7 <= 2.99){
				$c7 = 3;
			}else if($c7 >= 3.00 && $c7 <= 3.49){
				$c7 = 4;
			}else if($c7 >= 3.50 && $c7 <= 4.00){
				$c7 = 5;
			}
		/*input nilai kedatabase*/
			$datanilai = array(
				'id_kegiatan' => $id_kegiatan,
				'id_pendaftar' => $id_pendaftar,
				'nilai_attitude' =>$this->input->post('c1'),
				'nilai_loyalitas' =>$this->input->post('c2'),
				'nilai_kerjasama' =>$this->input->post('c3'),
				'nilai_keahlian' =>$this->input->post('c4'),
				'nilai_pengalaman' =>$this->input->post('c5'),
				'nilai_motivasi' =>$this->input->post('c6'),
				'nilai_ipk' =>$this->input->post('c7'),
				'c1' => $c1,
				'c2' => $c2,
				'c3' => $c3,
				'c4' => $c4,
				'c5' => $c5,
				'c6' => $c6,
				'c7' => $c7
				);

			if($this->m_user->doaddPenilaian($datanilai)){

				redirect('user/Pewawancara/afterSubmit');
			}
		}

		/*after submit*/
		public function afterSubmit(){
			$this->load->view('user/simpan_penilaian');
		}

	}
?>