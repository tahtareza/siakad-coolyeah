<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_matakuliah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_jurusan');
		$this->load->model('M_matakuliah');
	}

	public function index()
	{
		
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('matakuliah', $data);
	}

	public function getAjax($id_jurusan = null)
	{
		$data['data'] = $this->M_matakuliah->getMatakuliah();
		if($id_jurusan != null)
			$data['data'] = $this->M_matakuliah->getMatakuliahWhereKj($id_jurusan);
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_matakuliah->getMatakuliahWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'kode'	=>	$this->input->post('kode'),
			'nama'	=>	$this->input->post('nama'),
			'sks'	=>	$this->input->post('sks'),
			'kode_semester'	=>	$this->input->post('kode_semester'),
			'kode_jurusan'	=>	$this->input->post('kode_jurusan')
		);
		$data=$this->M_matakuliah->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'nama'=>$this->input->post('nama'),
			'sks'=>$this->input->post('sks'),
			'kode_semester'=>$this->input->post('kode_semester'),
			'kode_jurusan'=>$this->input->post('kode_jurusan')
		);
		$where=$this->input->post('kode');
		$data=$this->M_matakuliah->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_matakuliah->delete($where);
		echo json_encode($data);
	}

}