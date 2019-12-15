<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_krs extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listMatakuliah()
	{
		$query=$this->db->query("SELECT * FROM matkul");
		return $query->result();
	}

	public function getmhs()
	{
		$this->db->select('*');
        $this->db->from('mhs');
        $query = $this->db->get();
        return $query->result();
	}

	public function getKrsWhereNim($nim) {
		$this->db->select('krs.*, jadwal.kode_ruang as nr, tahun_ajaran.nama as nt, dosen.kode_matkul as mk, dosen.nama as nd, jadwal.hari as jh, jadwal.waktu_mulai as aw, jadwal.waktu_akhir as ak, jadwal.kode_ta as kt, jadwal.kode_semester as ks');
        $this->db->from('krs');
        $this->db->join('jadwal','krs.kode_jadwal=jadwal.kode');
        $this->db->join('tahun_ajaran','jadwal.kode_ta=tahun_ajaran.kode');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->where('krs.nim', $nim);
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

	public function getMhsWhereKj($where)
	{
		$query=$this->db->query("SELECT * FROM mhs where kode_jurusan='$where'");
		return $query->result();
	}

	public function getKrsMhs($nim) {
		$this->db->select('krs.*, jadwal.kode_ruang as nr, tahun_ajaran.nama as nt, dosen.kode_matkul as mk, dosen.nama as nd, jadwal.hari as jh, jadwal.waktu_mulai as aw, jadwal.waktu_akhir as ak');
        $this->db->from('krs');
        $this->db->join('jadwal','krs.kode_jadwal=jadwal.kode');
        $this->db->join('tahun_ajaran','jadwal.kode_ta=tahun_ajaran.kode');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->where('krs.nim', $nim);
        $query = $this->db->get();
        return $query->result();
	}

	public function getMhsWhereNip($nip) {
		$this->db->select('mhs.nim, mhs.nama, mhs.jk');
        $this->db->from('mhs');
        $this->db->join('dosen','mhs.nip_wali=dosen.nip');
        $this->db->where('mhs.nip_wali', $nip);
        $query = $this->db->get();
        return $query->result();
	}

	public function delete($where){
		$this->db->query("DELETE FROM krs where kode='$where'");
	}

	public function insert($data)
	{
		$this->db->insert('krs', $data);
	}

	public function updateStatusKrs($status, $where){
		$query=$this->db->query("UPDATE krs SET status='$status' WHERE kode='$where'");
	}
}
?>