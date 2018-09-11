<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Auth extends CI_Controller
	{
		
		var $ADMIN = 'Admin';
		var $SUADMIN = 'Super Admin';
		var $PEWAWANCARA = 'Pewawancara';

		function __construct()
		{
			parent::__construct();

			//load model
			
			$this->load->model('m_login');
		}

		public function index(){
			$data['level'] = $this->m_login->getLevelLogin();
			$this->load->view('auth/login',$data);
		}

		public function login_process(){
				$jabatan = $this->input->post('jabatan', true);
				$user = $this->input->post('user', true);
				$pass = $this->input->post('pass', true);

				$cek_user = $this->m_login->loginAdmin($user, $pass, $jabatan);

				if ($cek_user -> num_rows() > 0) {

					$session_data = array(
                            'id_user'   => $cek_user->row()->id_user,
                            'id_kegiatan' => $cek_user->row()->id_kegiatan,
                            'level' => $cek_user->row()->nama_level,
                        );

					$this->session->set_userdata('auth_session', $session_data);

					if ($cek_user->row()->nama_level == $this->ADMIN) {
						redirect('admin/Beranda');
					} elseif ($cek_user->row()->nama_level == $this->PEWAWANCARA) {
						redirect('user/Pewawancara');
					} elseif ($cek_user->row()->nama_level == $this->SUADMIN) {
						redirect('suadmin/SuAdmin');
					}
      //                       'user_id'   => $apps->id_user,
      //                       'user_name' => $apps->username,
      //                       'user_pass' => $apps->password,
      //                   );
					
				}

				// if($jabatan == '0') {
				// 	//if super admin

				// } else if ($jabatan == '1') {
				// 	// echo "Ketua Panitia";
				// 	$cek_user = $this->m_login->loginAdmin($user, $pass);
				// 	if ($cek_user->num_rows() > 0) {
				// 		echo "Login Success Ketua Panitia";
				// 	} else {
				// 		echo "Eror Password atau Username";
				// 	}
				// } else if ($jabatan == '2'){
				// 	$cek_user = $this->m_login->loginUser($user, $pass);
				// 	if ($cek_user->num_rows() > 0) {
				// 		echo "Login Success Ketua Panitia";
				// 	} else {
				// 		echo "Eror Password atau Username";
				// 	}
				// } else{
				// 	echo "eror";
				// }

				//admin
			// 	$cek_admin = $this->m_login->loginAdmin($user, $pass);
			// 	// $admin = count($cek_admin);

			// 	if ($cek_admin->num_rows() > 0 ) { //jika login sbg admin
			// 		$cek_a = $this->db->get_where('tb_admin',array('username' =>$user, 'password'=>$pass))->row();

			// 		$data = array('masuk'=>true, 'username' => $cek_a->username);
					
			// 		$this->session->set_userdata('auth_login',$data);

			// 		if($cek_a > 0){

			// 			redirect('admin/Beranda');
			// 		}else{
			// 			redirect('auth/Auth');
			// 		}
						
				
			// 	}else{
			// 		$cek_user = $this->m_login->loginUser($user, $pass);

			// 		if ($cek_user->num_rows() > 0 ) {
						
			// 			$cek_u = $this->db->get_where('tb_pewawancara',array('username' =>$user, 'password'=>$pass))->row();

			// 			$data = array('masuk'=>true, 'username' => $cek_u->username);
					
			// 			$this->session->set_userdata('auth_login',$data);

			// 			if ($data['jabatan'] == 'pengurus') {
			// 				redirect('user/User');
			// 			}else{
			// 				$this->session->set_flashdata('login_error', 'Username or password incorrect');
			// 				redirect('auth/Auth');
			// 			}
			// 		}
			// 	}


			}
		

		public function logout_proses(){
			$this->session->unset_userdata('auth_session');
			// $this->session->sess_destroy();
			// print_r($this->session->userdata['auth_session']['level']);
  			redirect('auth/Auth');
		}
	}
?>