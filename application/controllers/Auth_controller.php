<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('user_model', 'role_model'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('u_login') == true) 
		{
			$this->session->sess_destroy();
			redirect('dashboard','refresh');
		}
		else
		{
			$data['title'] = "Login Aplikasi";
			$this->template->login_display('auth_dir/login_panel', $data);
		}
	}

	public function do_login()
	{
		if ($this->session->userdata('u_login') == true) 
		{
			redirect('dashboard','refresh');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');	
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		# Space From Validation Message

		// End Space
		if (isset($_POST['login']) && $this->form_validation->run() == true) 
		{
			$username = $this->input->post('username');
			$password  = sha1($this->input->post('password'));

			$cek_login = $this->user_model->user_login($username, $password);

			if ($cek_login->num_rows() > 0) 
			{
				//user get
				$u = $cek_login->row();

				//cek user blocked
				if ($u->user_active == "blocked") 
				{
					$this->session->set_flashdata('user_block', '<div class="alert alert-danger"><i class="fa fa-ban"></i> Akun anda di blokir saat ini. Silahkan Hubungi Admin.</div> ');
					redirect('login','refresh');
				}

				else if ($u->user_active == "non_active") 
				{
					$this->session->set_flashdata('user_non_active', '<div class="alert alert-danger">i.fa.fa-ban Akun anda di Non Aktifkan saat ini. Silahkan Hubungi Admin</div>');
					redirect('login','refresh');
				}
				else
				{
					$role = $this->role_model->get(array('id' => $u->role_id));

					//update user last login
					$this->user_model->edit(array('user_last_login' => date('Y-m-d H:i:s')), $u->user_id);

					//session create
					$this->session->set_userdata('u_login', true);
					$this->session->set_userdata('u_id', $u->user_id);
					$this->session->set_userdata('u_username', $u->user_name);
					$this->session->set_userdata('u_fullname', $u->user_full_name);
					$this->session->set_userdata('u_email', $u->user_email);
					$this->session->set_userdata('u_nik', $u->user_nik);
					$this->session->set_userdata('u_jk', $u->user_jk);
					$this->session->set_userdata('u_last_login', $u->user_last_login);
					$this->session->set_userdata('u_pelayanan_id', $u->pelayanan_id);
					$this->session->set_userdata('u_role', $u->role_id);
					$this->session->set_userdata('u_role_name', $role['role']);

					redirect('dashboard','refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('login_failed', '<div class="alert alert-danger">Username / Password Salah</div>');
				redirect('login','refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('username', form_error('username'));
			$this->session->set_flashdata('password', form_error('password'));
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */