<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_khs extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_khs');
        $this->load->model('M_mahasiswa');
    }

    public function index()
    {
        $this->load->model('M_jadwal');
        $data['jadwal']=$this->M_jadwal->listJadwal();
        $this->load->view('krs', $data);
    }

    public function getAjax($id_jadwal = null)
    {
        $nip = $this->session->userdata('uname');
        $data['data'] = $this->M_khs->getmhs($nip);
        if($id_jadwal != null)
            $data['data'] = $this->M_khs->getMhsWhereJd($id_jadwal, $nip);
        echo json_encode($data);
    }

    public function detailkhs() {
        $nim = $this->uri->segment(3);
        $data['mhs'] = $this->M_mahasiswa->getMhsWhereId($nim);
        $data['khs'] = $this->M_khs->getKhsWhereNim($nim);
        $this->load->view('detailkhs', $data);
    }

    // public function khsMahasiswa() {
    //     $kode_jadwal = $this->uri->segment(3);
    //     $data['mhs'] = $this->M_khs->getMhsKhs($kode_jadwal);
    //     $this->load->view('menudsn/khsMahasiswa', $data);
    // }

    public function read(){
        $id=$this->session->userdata('uname');
        $data= $this->M_khs->getKhsWhereNim($id);
        echo json_encode($data);
    }

    public function whereMatakuliahJurusan(){
        $id=$this->input->get('id');
        $data=$this->M_rmatkuliah->getMatakuliahWhereKj($id);
        echo json_encode($data);
    }

    public function where(){
        $id=$this->input->get('id');
        $data=$this->M_khs->getMhsNim($id);
        echo json_encode($data);
    }

    // public function updateNilai(){
    //     $id=$this->input->get('id');
    //     $data=$this->M_khs->getKhsWhereId($id);
    //     echo json_encode($data);
    // }

    // public function add(){
    //     $dat = array(
    //         'kode'  =>  $this->input->post('kode'),
    //         'nama'  =>  $this->input->post('nama'),
    //         'sks'   =>  $this->input->post('sks'),
    //         'kode_semester' =>  $this->input->post('kode_semester'),
    //         'kode_jurusan'  =>  $this->input->post('kode_jurusan')
    //     );
    //     $data=$this->M_matakuliah->insert($dat);
    //     echo json_encode($data);
    // }

    public function update(){
        $dat=array(
            'nim'=>$this->input->post('nim'),
            'nilai'=>$this->input->post('nilai')
        );
        $where=$this->input->post('nim');
        $data=$this->M_khs->update($dat, $where);
        echo json_encode($data);
    }

    // public function delete(){
    //     $where=$this->input->post('kode');
    //     $data=$this->M_krs->delete($where);
    //     echo json_encode($data);
    // }

}