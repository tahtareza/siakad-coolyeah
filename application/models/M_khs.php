<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_khs extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listMatakuliah()
	{
		$query=$this->db->query("SELECT * FROM matkul");
		return $query->result();
	}

	public function getmhs($nip)
	{
		$this->db->select('khs.*, mhs.nama as nm, tahun_ajaran.nama as nt, jadwal.kode as jd');
        $this->db->from('khs');
        $this->db->join('mhs','khs.nim=mhs.nim');
        $this->db->join('krs','khs.kode_krs=krs.kode');
        $this->db->join('jadwal','krs.kode_jadwal=jadwal.kode');
        $this->db->join('tahun_ajaran','khs.kode_ta=tahun_ajaran.kode');
        $this->db->where('jadwal.nip', $nip);
        $this->db->where('krs.status', "1");
        $query = $this->db->get();
        return $query->result();
	}

	// public function getMhsKhs($kode_jadwal){
	// 	$this->db->select('khs.*, mhs.nama as nm');
 //        $this->db->from('khs');
 //        $this->db->join('krs','khs.kode_krs=krs.kode');
 //        $this->db->join('mhs','khs.nim=mhs.nim');
 //        $this->db->where('krs.kode_jadwal', $kode_jadwal);
 //        $this->db->where('krs.status', "1");
 //        $query = $this->db->get();
 //        return $query->result();
	// }

	public function getKhsWhereNim($where) {
		$this->db->select('khs.*, matkul.nama as nm, semester.nama as ns, tahun_ajaran.nama as nt');
        $this->db->from('khs');
        $this->db->join('matkul','khs.kode_mk=matkul.kode');
        $this->db->join('semester','khs.kode_semester=semester.kode');
        $this->db->join('tahun_ajaran','khs.kode_ta=tahun_ajaran.kode');
        $this->db->where("nim", $where);
        $query = $this->db->get();
        return $query->result();
	}

	public function getMhsNim($where)
	{
		$query=$this->db->query("SELECT khs.*, mhs.nama as nm FROM khs INNER JOIN mhs ON khs.nim=mhs.nim WHERE khs.nim='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'nim' => $value->nim,
					'nama' => $value->nm,
					'nilai' => $value->nilai
				);
			}
		}
		return $data;
	}

	public function getMhsWhereJd($where, $nip)
	{
		$query=$this->db->query("SELECT khs.*, mhs.nama as nm, tahun_ajaran.nama as nt, jadwal.kode as jd FROM khs INNER JOIN krs on khs.kode_krs=krs.kode INNER JOIN jadwal on krs.kode_jadwal=jadwal.kode INNER JOIN tahun_ajaran on khs.kode_ta=tahun_ajaran.kode INNER JOIN mhs on mhs.nim=khs.nim where krs.kode_jadwal='$where' AND krs.status='1' AND jadwal.nip='$nip'");
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('khs', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM khs where kode_krs='$where'");
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where('nim', $where);
		$this->db->update('khs', $data);
	}
}
?>