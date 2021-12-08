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

    public function unSelected(){
        $result = $this->join('alternatif', 'alternatif.kode_kriteria = kriteria.kode', 'left')
        // ->where('alternatif.nilai_kriteria is null')
        ->select('kriteria.kode, kriteria.nama,alternatif.kode_kriteria')->get()->getResultArray();
        return $result;
    }

}
