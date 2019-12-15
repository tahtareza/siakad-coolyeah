<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listJadwal()
	{
		$this->db->select('jadwal.*, dosen.kode_matkul as km');
        $this->db->from('jadwal');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $query = $this->db->get();
        return $query->result();
	}

	public function getJadwal()
	{
		$this->db->select('jadwal.*, semester.nama as ns, tahun_ajaran.nama as nt, dosen.kode_matkul as mk');
        $this->db->from('jadwal');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->join('semester','jadwal.kode_semester=semester.kode');
        $this->db->join('tahun_ajaran','jadwal.kode_ta=tahun_ajaran.kode');
        $query = $this->db->get();
        return $query->result();
	}

	public function getJadwalWhereKj($where)
	{
		$query=$this->db->query("SELECT j.kode, j.nip, d.kode_jurusan as mk, j.kode_ruang, s.nama as ns, t.nama as nt, hari, waktu_mulai, waktu_akhir, kuota FROM jadwal as j INNER JOIN dosen as d on j.nip=d.nip inner join semester as s on j.kode_semester=s.kode inner join tahun_ajaran as t on j.kode_ta=t.kode where d.kode_jurusan='$where'");
		return $query->result();
	}

	public function getJadwalMhs($idJurusan) {
		$this->db->select('jadwal.*, semester.nama as ns, tahun_ajaran.nama as nt, matkul.nama as mk, dosen.nama as nd, ruang.kuota as rk');
        $this->db->from('jadwal');
        $this->db->join('ruang','jadwal.kode_ruang=ruang.kode');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->join('semester','jadwal.kode_semester=semester.kode');
        $this->db->join('tahun_ajaran','jadwal.kode_ta=tahun_ajaran.kode');
        $this->db->join('matkul','dosen.kode_matkul=matkul.kode');
        $this->db->where('dosen.kode_jurusan', $idJurusan);
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getJadwalId($kode) {
		$this->db->select('jadwal.*, semester.nama as ns, tahun_ajaran.nama as nt, matkul.nama as mk, dosen.nama as nd, ruang.kuota as rk');
        $this->db->from('jadwal');
        $this->db->join('ruang','jadwal.kode_ruang=ruang.kode');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->join('semester','jadwal.kode_semester=semester.kode');
        $this->db->join('tahun_ajaran','jadwal.kode_ta=tahun_ajaran.kode');
        $this->db->join('matkul','dosen.kode_matkul=matkul.kode');
        $this->db->where('jadwal.kode', $kode);
        $query = $this->db->get();
        return $query->result()[0];
	}

	public function getJadwalWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM jadwal WHERE kode='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode' => $value->kode,
					'nip' => $value->nip,
					'kode_ruang'	=>	$value->kode_ruang,
					'kode_semester'	=>	$value->kode_semester,
					'kode_ta'	=>	$value->kode_ta,
					'hari'	=>	$value->hari,
					'waktu_mulai'	=>	$value->waktu_mulai,
					'waktu_akhir'	=>	$value->waktu_akhir 
				);
			}
		}
		return $data;
	}

	public function getJadwalWhereNip($where) {
		$this->db->select('jadwal.*, dosen.kode_matkul as km');
        $this->db->from('jadwal');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->where("jadwal.nip", $where);
        $query = $this->db->get();
        return $query->result();
	}

	public function getJadwalNip($nip) {
		$this->db->select('jadwal.*, tahun_ajaran.nama as nt');
        $this->db->from('jadwal');
        $this->db->join('dosen','jadwal.nip=dosen.nip');
        $this->db->join('tahun_ajaran','jadwal.kode_ta=tahun_ajaran.kode');
        $this->db->where("jadwal.nip", $nip);
        $query = $this->db->get();
        return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('jadwal', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode", $where);
		$this->db->update('jadwal', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM jadwal where kode='$where'");
	}
}
?>
