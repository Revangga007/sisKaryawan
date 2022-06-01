<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'kode';
    protected $useAutoIncrement = false;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['kode', 'nama', 'jekel', 'no_hp', 'alamat', 'username', 'password', 'status'];
 
    public function unSelected($kode){
        $result = $this->db->query("SELECT * FROM `pegawai` CROSS JOIN `kriteria` WHERE kriteria.kode NOT IN 
        (SELECT kriteria.kode FROM kriteria JOIN alternatif ON kriteria.kode = alternatif.kode_kriteria 
        WHERE alternatif.kode_pegawai = '$kode')")->getResultArray();
        return $result;
    }

    public function countAlternatif()
    {
        $result = $this->join("alternatif", "alternatif.kode_pegawai = pegawai.kode", "left")
        ->select('pegawai.kode,pegawai.nama,count(alternatif.id) as alternatif')
        ->groupBy('pegawai.kode')
        ->where('pegawai.status','Aktif')
        ->orderBy('pegawai.created_at', 'ASC')
        ->get()->getResultArray();
        return $result;
    }
    
}
