<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persyaratan_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('persyaratan_model', 'pelayanan_model', 'jenis_model'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array(
						"title" => "Persyaratan Pelayanan",
						"jenis_pelayanan" => $this->jenis_model->get(array('select' => '*')),
						
					);

		$this->template->display('persyaratan/persyaratan_list', $data);
	}

	public function add()
	{
		$syarat = $this->input->post('syarat');
		$jenis_id = $this->input->post('jenis_id');

		$ar = array(
						"persyaratan_id" => "",
						"persyaratan_name" => $syarat,
						"jenis_id" => $jenis_id
					);

		$this->persyaratan_model->add($ar);

		$json = $this->persyaratan_model->get(array('select' => "*", 'jenis' => $jenis_id));
		
		echo  "<ul>";
		foreach ($json as $d) {
			echo "<li>".$d['persyaratan_name'];
			echo " <span>(<a href='javascript:void(0)' onclick='del_syarat(".$d['persyaratan_id'].",".$d['jenis_id'].")'>Hapus</a>)</span></li>";
		}
		echo "</ul>";
	}

	public function del()
	{
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');

		$this->persyaratan_model->del($id);

		$json = $this->persyaratan_model->get(array('select' => "*", "jenis" => $jenis));
		echo  "<ul>";
		foreach ($json as $d) {
			echo "<li>".$d['persyaratan_name'];
			echo " <span>(<a href='javascript:void(0)' onclick='del_syarat(".$d['persyaratan_id'].",".$d['jenis_id'].")'>Hapus</a>)</span></li>";
		}
		echo "</ul>";
	}
}

/* End of file  */
/* Location: ./application/controllers/ */