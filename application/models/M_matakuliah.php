<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matakuliah extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listMatakuliah()
	{
		$query=$this->db->query("SELECT * FROM matkul");
		return $query->result();
	}

	public function getMatakuliah()
	{
		$this->db->select('matkul.*, jurusan.nama as jn');
        $this->db->from('matkul');
        $this->db->join('jurusan','matkul.kode_jurusan=jurusan.kode');
        $query = $this->db->get();
        return $query->result();
	}

	public function getMatakuliahWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM matkul WHERE kode='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode' => $value->kode,
					'nama' => $value->nama,
					'sks' => $value->sks,
					'kode_semester' => $value->kode_semester,
					'kode_jurusan' => $value->kode_jurusan 
				);
			}
		}
		return $data;
	}

	public function getMatakuliahWhereKj($where)
	{
		$query=$this->db->query("SELECT * FROM matkul where kode_jurusan='$where'");
		return $query->result();
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('matkul', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode", $where);
		$this->db->update('matkul', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM matkul where kode='$where'");
	}
}
?>