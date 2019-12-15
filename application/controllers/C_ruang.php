<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ruang extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_jurusan');
		$this->load->model('M_ruang');
	}

	public function index()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$data['ruang']=$this->M_ruang->getRuang();
		$this->load->view('ruang', $data);
	}

	public function getAjax($id_jurusan = null)
	{
		$data['data'] = $this->M_ruang->getRuang();
		if($id_jurusan != null)
			$data['data'] = $this->M_ruang->getRuangWhereKj($id_jurusan);
		echo json_encode($data);
	}

	// public function read(){
	// 	$data= $this->M_ruang->getRuang();
	// 	echo json_encode($data);
	// }

	// public function whereRuangJurusan(){
 //        $id=$this->input->get('id');
 //        $data=$this->M_ruang->getRuangWhereKj($id);
 //        echo json_encode($data);
 //    }

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_ruang->getRuangWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'kode'	=>	$this->input->post('kode'),
			'nama'	=>	$this->input->post('nama'),
			'kuota'	=>	$this->input->post('kuota'),
			'kode_jurusan'	=>	$this->input->post('kode_jurusan')
		);
		$data=$this->M_ruang->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'nama'=>$this->input->post('nama'),
			'kuota'=>$this->input->post('kuota'),
			'kode_jurusan'=>$this->input->post('kode_jurusan')
		);
		$where=$this->input->post('kode');
		$data=$this->M_ruang->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_ruang->delete($where);
		echo json_encode($data);
	}
}