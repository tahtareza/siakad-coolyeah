<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jurusan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_jurusan');
		$this->load->helper('url','form');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['jurusan']=$this->M_jurusan->listJurusan();
		$this->load->view('jurusan', $data);
	}

	public function read(){
		$data= $this->M_jurusan->listJurusan();
		echo json_encode($data);
	}

	public function where(){
		$id=$this->input->get('id');
		$data=$this->M_jurusan->getJurusanWhereId($id);
		echo json_encode($data);
	}

	public function add(){
		// $dat = array(
		// 	'kode'	=>	$this->input->post('kode'),
		// 	'nama'	=>	$this->input->post('nama')
		// );
		// $data=$this->M_jurusan->insert($dat);
		// echo json_encode($data);
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|is_unique[jurusan.kode]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if($this->form_validation->run() == FALSE){
			echo json_encode(array('sta' => 0, 'msg'=>'ERROR: '.validation_errors()));
		}else{
			$dat = array(
				'kode'	=>	$this->input->post('kode'),
				'nama'	=>	$this->input->post('nama')
			);
			$data=$this->M_jurusan->insert($dat);
			echo json_encode(array('sta' => 1, $data));
		}
	}

	public function update(){
		// $dat=array(
		// 	'kode'=>$this->input->post('kode'),
		// 	'nama'=>$this->input->post('nama')
		// );
		// $where=$this->input->post('kode');
		// $data=$this->M_jurusan->update($dat, $where);
		// echo json_encode($data);
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if($this->form_validation->run() == FALSE){
			echo json_encode(array('result' => 'failed', 'msg'=>'ERROR: '.validation_errors()));
		}else{
			$dat=array(
				'kode'=>$this->input->post('kode'),
				'nama'=>$this->input->post('nama')
			);
			$where=$this->input->post('kode');
			$data=$this->M_jurusan->update($dat, $where);
			echo json_encode(array('result' => 'success', $data));
		}
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_jurusan->delete($where);
		echo json_encode($data);
	}
}