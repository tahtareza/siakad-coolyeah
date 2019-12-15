<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jadwal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_jadwal');
		$this->load->model('M_ruang');
	}
	
	public function index()
	{
		$this->load->view('jadwal');
	}

	public function getAjax($id_jurusan = null)
	{
		$data['data'] = $this->M_jadwal->getJadwal();
		if($id_jurusan != null)
			$data['data'] = $this->M_jadwal->getJadwalWhereKj($id_jurusan);
		echo json_encode($data);
	}

	public function read(){
		$data=$this->M_jadwal->listJadwal();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_jadwal->getJadwalWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$kode_ruang = $this->input->post('kode_ruang');
		$kuota = $this->M_ruang->getKuota($kode_ruang);
		$dat = array(
			'kode'	=>	$this->input->post('kode'),
			'nip'	=>	$this->input->post('nip'),
			'kode_ruang'	=>	$kode_ruang,
			'kuota'			=> $kuota,
			'kode_semester'	=>	$this->input->post('kode_semester'),
			'kode_ta'	=>	$this->input->post('kode_ta'),
			'hari'	=>	$this->input->post('hari'),
			'waktu_mulai'	=>	$this->input->post('waktu_mulai'),
			'waktu_akhir'	=>	$this->input->post('waktu_akhir')
		);
		$data=$this->M_jadwal->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'nip'=>$this->input->post('nip'),
			'kode_ruang'	=>	$this->input->post('kode_ruang'),
			'kode_semester'	=>	$this->input->post('kode_semester'),
			'kode_ta'	=>	$this->input->post('kode_ta'),
			'hari'	=>	$this->input->post('hari'),
			'waktu_mulai'	=>	$this->input->post('waktu_mulai'),
			'waktu_akhir'	=>	$this->input->post('waktu_akhir')
		);
		$where=$this->input->post('kode');
		$data=$this->M_jadwal->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_jadwal->delete($where);
		echo json_encode($data);
	}
}