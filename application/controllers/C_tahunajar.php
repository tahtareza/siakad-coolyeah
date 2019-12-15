<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tahunajar extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_tahunajar');
	}
	
	public function index()
	{
		$this->load->view('tahunajar');
	}

	public function read(){
		$data= $this->M_tahunajar->listTahunAjar();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_tahunajar->getTAWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'kode'	=>	$this->input->post('kode'),
			'nama'	=>	$this->input->post('nama')
		);
		$data=$this->M_tahunajar->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'nama'=>$this->input->post('nama')
		);
		$where=$this->input->post('kode');
		$data=$this->M_tahunajar->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_tahunajar->delete($where);
		echo json_encode($data);
	}
}