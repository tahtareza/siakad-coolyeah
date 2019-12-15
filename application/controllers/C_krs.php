<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_krs extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_krs');
        $this->load->model('M_khs');
        $this->load->model('M_mahasiswa');
    }

    public function index()
    {
        $this->load->model('M_jadwal');
        $data['jadwal']=$this->M_jadwal->listJadwal();
        $this->load->view('krs', $data);
    }

    public function getAjax($id_jurusan = null)
    {
        $data['data'] = $this->M_krs->getmhs();
        if($id_jurusan != null)
            $data['data'] = $this->M_krs->getMhsWhereKj($id_jurusan);
        echo json_encode($data);
    }

    public function detailkrs() {
        $nim = $this->uri->segment(3);
        $data['mhs'] = $this->M_mahasiswa->getMhsWhereId($nim);
        $data['krs'] = $this->M_krs->getKrsWhereNim($nim);
        $this->load->view('detailkrs', $data);
    }

    public function detailkrsDosen() {
        $nim = $this->uri->segment(3);
        $data['mhs'] = $this->M_mahasiswa->getMhsWhereId($nim);
        $data['krs'] = $this->M_krs->getKrsWhereNim($nim);
        $this->load->view('menudsn/detailkrs', $data);
    }

    function updateStatusKrs(){
        $status=$this->input->post('status');
        $where=$this->input->post('kode');
        $this->M_krs->updateStatusKrs($status, $where);
        $nim = $this->uri->segment(3);
        $data['mhs'] = $this->M_mahasiswa->getMhsWhereId($nim);
        $data['krs'] = $this->M_krs->getKrsWhereNim($nim);
        $dat = array(
            'nim'  =>  $this->input->post('nim'),
            'kode_krs'  =>  $this->input->post('kode'),
            'kode_mk'  =>  $this->input->post('kode_mk'),
            'kode_semester' =>  $this->input->post('kode_semester'),
            'kode_ta'  =>  $this->input->post('kode_ta'),
            'nilai' => '0'
        );
        if($status=='1'){
             $this->M_khs->insert($dat);
        }else{
            $this->M_khs->delete($where);
        }
        $this->load->view('menudsn/detailkrs', $data);
    }

    public function read(){
        $data= $this->M_matakuliah->getMatakuliah();
        echo json_encode($data);
    }

    public function whereMatakuliahJurusan(){
        $id=$this->input->get('id');
        $data=$this->M_rmatkuliah->getMatakuliahWhereKj($id);
        echo json_encode($data);
    }

    public function where(){
        $id=$this->input->get('id');
        $data=$this->M_matakuliah->getMatakuliahWhereId($id);
        echo json_encode($data);
    }

    public function add(){
        $dat = array(
            'kode'  =>  $this->input->post('kode'),
            'nama'  =>  $this->input->post('nama'),
            'sks'   =>  $this->input->post('sks'),
            'kode_semester' =>  $this->input->post('kode_semester'),
            'kode_jurusan'  =>  $this->input->post('kode_jurusan')
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
        $data=$this->M_krs->delete($where);
        echo json_encode($data);
    }
}