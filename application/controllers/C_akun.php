<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_akun extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_akun');
	}

	public function index()
	{
		$data['akun']=$this->M_akun->listAkun();
		$this->load->view('akun', $data);
	}

	public function getAjax($lv_akun = null)
	{
		$data['data'] = $this->M_akun->listAkun();
		if($lv_akun != null)
		 	$data['data'] = $this->M_akun->getAkunWhereLv($lv_akun);
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_akun->getAkunWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'uname'	=>	$this->input->post('uname'),
			'pwd'	=>	$this->input->post('pwd'),
			'level'	=>	$this->input->post('level')
		);
		$data=$this->M_akun->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'uname'	=>	$this->input->post('uname'),
			'pwd'	=>	$this->input->post('pwd'),
			'level'	=>	$this->input->post('level')
		);
		$where=$this->input->post('uname');
		$data=$this->M_akun->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('uname');
		$data=$this->M_akun->delete($where);
		echo json_encode($data);
	}

}