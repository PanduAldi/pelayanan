<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_model', 'role_model', 'pelayanan_model'));
		$this->load->library('form_validation');

		if ($this->session->userdata('u_login') == false) {
			redirect('login', 'refresh');
		}

	}

	public function index()
	{
		if ($this->session->userdata('u_role') != 1) {
			$this->session->set_flashdata('failed', 'Anda tidak di Ijinkan Mengakses Halaman Setting User');
			redirect('dashboard','refresh');
		}
		else
		{
			$data =array(
							"title" => "Setting User",
							"user" => $this->user_model->user_join(),
						);
			$this->template->display('user/user_list', $data);			
		}

	}

	public function add()
	{
		if ($this->session->userdata('u_role') != 1) 
		{
			$this->session->set_flashdata('failed', 'Anda tidak di Ijinkan Mengakses Halaman Setting User');
			redirect('dashboard','refresh');
		}
		else
		{
			$this->__rules();

			if (isset($_POST['simpan']) && $this->form_validation->run() == true) 
			{


				$record  = array(
									"user_id" => '',
									"user_nik" => $this->input->post('nik'),
									"user_name" => $this->input->post('username'),
									"user_full_name" => $this->input->post('fullname'),
									"user_password" => sha1($this->input->post('password')),
									"user_jk" => $this->input->post('jk'),
									"user_email" => $this->input->post('email'),
									"role_id" => $this->input->post('role'),
									"user_created_date" => date('Y-m-d H:i:s'),
									"user_last_login" => date('Y-m-d H:i:s'),
									"pelayanan_id" => $this->input->post('pelayanan'),
									"user_active" => 'active'
								);

				$this->user_model->add($record);
				$this->session->set_flashdata('notif', 'Tambah User Berhasil');
				redirect('setting-user','refresh');
			}

			$data = array(
							"title" => "Tambah User",
							"role" => $this->role_model->get(),
							"pelayanan" => $this->pelayanan_model->get(array('select' => "*"))
						 );

			$this->template->display('user/user_add', $data);
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('u_role') != 1) 
		{
			$this->session->set_flashdata('failed', 'Anda tidak di Ijinkan Mengakses Halaman Setting User');
			redirect('dashboard','refresh');
		}
		else
		{

		}
	}

	public function del()
	{
		$id = $this->input->post('id');

		$this->user_model->del($id);
		$this->session->set_flashdata('notif', 'Tambah data User Berhasil');
		redirect('setting-user','refresh');
	}

	public function view_user($id)
	{
		$data = array(
						"title" => "Detail User",
						"data" => $this->user_model->user_join(array('id'=>$id))
					);

		$this->template->display('user/user_view', $data);
	}

	public function __rules()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|xss_clean');
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required|xss_clean');
		$this->form_validation->set_rules('role', 'Level Akses', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pelayanan', 'Pelayanan', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" data-animate="fadeInLeft">', '</div>');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */