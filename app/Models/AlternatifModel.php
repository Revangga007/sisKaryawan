<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'kode_pegawai', 'kode_kriteria', 'nilai_kriteria'];
    protected $useTimestamps    = true;

    public function joinDatas(){
        $result = $this->db->query("SELECT alternatif.* FROM alternatif JOIN pegawai 
        ON pegawai.kode = alternatif.kode_pegawai JOIN kriteria ON kriteria.kode = alternatif.kode_kriteria")
        ->getResultArray();
        return $result;
    }
}
