<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'kode_pegawai', 'kode_kriteria', 'nilai_kriteria'];
    protected $useTimestamps    = true;

    public function getJoinData($kode){
        return $this->db->table('alternatif')
        ->select('')
        ->join('pegawai', 'pegawai.kode=alternatif.kode_pegawai')
        ->join('kriteria', 'kriteria.kode=alternatif.kode_kriteria')
        ->where(['pegawai.kode' => $kode])->get()->getResultArray();
    }

}
