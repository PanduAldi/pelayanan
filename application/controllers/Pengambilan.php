<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengambilan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Pengambilan Surat Pindah Datang";
		$data['data_view'] = $this->db->get('pengambilan')->result(); 

		$this->load->view('pengambilan/pengambilan_list', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah DAta pengambilan';

		if (isset($_POST['simpan'])) {

			$ex = explode('-',$this->input->post('tgl_masuk'));
			$tgl_masuk = $ex[2]."-".$ex[1]."-".$ex[0];

		 	$rec = array(
		 					'pengambilan_id' => "",
		 					'nama' => $this->input->post('nama'),
		 					'status' => $this->input->post('status'),
		 					'tgl_masuk' => $tgl_masuk,
		 					'nik' => $this->input->post('nik'),
		 					'keterangan' => $this->input->post('ket')
		 				);
		 	$this->db->insert('pengambilan', $rec);
		 	redirect('pengambilan/index','refresh');
		 }	

		 $this->load->view('pengambilan/add_pengambilan', $data);
	}

	public function ubah_status()
	{
		$v = $this->input->post('v');
		$ket = $this->input->post('ket');

		if ($v == 'selesai') 
		{
			$d = array('status' => $v, 'tgl_keluar' => date('Y-m-d H:i:s'), 'keterangan' => $ket);
		}
		else
		{
			$d = array('status' => $v, 'keterangan' => $ket);
		}

		$this->db->where('pengambilan_id', $this->input->post('id'));
		$this->db->update('pengambilan', $d);
	}
}

/* End of file  */
/* Location: ./application/controllers/ */