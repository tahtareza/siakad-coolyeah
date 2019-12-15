<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ruang extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listRuang()
	{
		$query=$this->db->query("SELECT * FROM ruang");
		return $query->result();
	}

	public function getKuota($kode_ruang) {
		$this->db->select('kuota');
	    $this->db->from('ruang');
	    $this->db->where('kode', $kode_ruang);
	    $query = $this->db->get();
		$hasil = $query->row();
		return $hasil->kuota;
	}

	public function getKuotaMinMax($kuotamin, $kuotamax) {
		$query=$this->db->query("SELECT * FROM ruang where kuota BETWEEN '$kuotamin' AND '$kuotamax'");
		return $query->result();
	}

	public function getRuang()
	{
		$this->db->select('ruang.*, jurusan.nama as jn');
        $this->db->from('ruang');
        $this->db->join('jurusan','ruang.kode_jurusan=jurusan.kode');
        $query = $this->db->get();
        return $query->result();
	}

	public function getRuangWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM ruang WHERE kode='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode' => $value->kode,
					'nama' => $value->nama,
					'kuota' => $value->kuota,
					'kode_jurusan' => $value->kode_jurusan 
				);
			}
		}
		return $data;
	}

	public function getRuangWhereKj($where)
	{
		$query=$this->db->query("SELECT * FROM ruang where kode_jurusan='$where'");
		return $query->result();
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('ruang', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode", $where);
		$this->db->update('ruang', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM ruang where kode='$where'");
	}
}
?>