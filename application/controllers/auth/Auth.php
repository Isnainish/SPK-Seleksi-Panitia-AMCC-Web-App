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
							'id_detail_user' => $cek_user->row()->id_detail_user,
                            'id_user'   => $cek_user->row()->id_user,
                            'nama' => $cek_user->row()->nama,
                            'username' => $cek_user->row()->username,
                            'password' => $cek_user->row()->password, 
                            'id_kegiatan' => $cek_user->row()->id_kegiatan,
                            'nama_kegiatan' => $cek_user->row()->nama_kegiatan,
                            'tanggal' => $cek_user->row()->tanggal,
                            'id_level' => $cek_user->row()->id_level,
                            'level' => $cek_user->row()->nama_level
                        );
					$this->session->set_userdata('auth_session', $session_data);
					if ($cek_user->row()->nama_level == $this->ADMIN) {
						redirect('admin/Beranda');
					} elseif ($cek_user->row()->nama_level == $this->PEWAWANCARA) {
						redirect('user/Pewawancara');
					} elseif ($cek_user->row()->nama_level == $this->SUADMIN) {
						redirect('suadmin/SuAdmin');
					}
				}else{

					echo "<script type='text/javascript'>alert('Maaf, Data Yang Anda Masukkan Salah! Silahkan Ulangi.');window.location.href='".site_url('auth/Auth')."'</script>";
				}
			}
		

		public function logout_proses(){
			$this->session->unset_userdata('auth_session');
			// $this->session->sess_destroy();
			// print_r($this->session->userdata['auth_session']['level']);
  			redirect('auth/Auth');
		}
	}
?>