<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'kode';
    protected $useAutoIncrement = false;
    protected $useTimestamps    = true;
    protected $allowedFields    = ['kode', 'nama', 'bobot', 'status'];

    public function unSelected($kode){
        $result = $this->db->query("SELECT kriteria.* FROM `kriteria` WHERE kriteria.kode NOT IN 
        (SELECT kriteria.kode FROM kriteria JOIN alternatif ON kriteria.kode = alternatif.kode_kriteria 
        WHERE alternatif.kode_pegawai = '$kode')")->getResultArray();
        return $result;
    }
    
}

