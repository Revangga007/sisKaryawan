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

    public function getData($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode' => $kode]);
        }
    }

    public function storeData($kriteria)
    {
        return $this->db->table($this->table)->insert($kriteria);
    }

    public function updateData($kriteria, $kode)
    {
        return $this->db->table($this->table)->update($kriteria,['kode' => $kode]);
    }

    public function deleteData($kode)
    {
        return $this->delete($kode);
    }
}
