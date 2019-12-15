<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_semester extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_semester');
	}
	
	public function index()
	{
		$this->load->view('semester');
	}

	public function read(){
		$data= $this->M_semester->listSemester();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_semester->getSemWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'kode'	=>	$this->input->post('kode'),
			'nama'	=>	$this->input->post('nama'),
			'status'	=>	$this->input->post('status')
		);
		$data=$this->M_semester->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'nama'=>$this->input->post('nama'),
			'status'	=>	$this->input->post('status')
		);
		$where=$this->input->post('kode');
		$data=$this->M_semester->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_semester->delete($where);
		echo json_encode($data);
	}
}