<?php 

	/**
	* 
	*/
	class FormPendaftar extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('url'));
			$this->load->model("m_user");
		}
		


		public function index(){
			$addkegiatan = $this->session->userdata('addkegiatan');
			$data['kegiatanamcc'] = $this->m_user->getKegiatan(); 

			$data['select_sie'] = $this->m_user->getSie($addkegiatan['id_kegiatan']);
			$this->load->view('user/pendaftaran',$data);
		}

		/*filter kegiatan*/
		public function doSearchKegiatan(){
			$addkegiatan['id_kegiatan'] = $this->input->post('id_kegiatan');
			$this->session->set_userdata('addkegiatan', $addkegiatan);
			redirect('user/FormPendaftar');
		}

		public function processaddPendaftar($id_kegiatan){

			//upload foto
			$config['upload_path'] = 'assets/foto/';
			$config['allowed_types'] = 'jpg|jpeg|png|bmp';
			$config['max_size'] = '100';
			$config['file_name'] = strtolower(str_replace(' ','-',$this->input->post('nama_pendaftar')));
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('filefoto')) {
				$foto = $this->upload->data('file_name');
			}else{
				echo $this->upload->display_errors(); exit();
			}

			$data = array(

				'id_kegiatan' => $id_kegiatan,
				'id_pendaftar' => $this->input->post('id_pendaftar'),
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
				'posisi2' => $this->input->post('posisi2'),
				'filefoto' => $foto
				
				);
			

			if($this->m_user->insert($data)){
				redirect('user/FormPendaftar/aftersubmit');
			}else{
				echo 'error';
			}

		}


		/*after submit*/
		public function afterSubmit(){
			$this->load->view('user/simpan_pendaftaran');
		}



		

	}
?>