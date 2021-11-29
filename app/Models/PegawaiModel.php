<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'kode';
    protected $useAutoIncrement = false;
    protected $useTimestamps    = true;
    protected $allowedFields    = [];

    public function getData($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode' => $kode]);
        }
    }

    public function storeData($pegawai)
    {
        return $this->db->table($this->table)->insert($pegawai);
    }

    public function updateData($pegawai, $kode)
    {
        return $this->db->table($this->table)->update($pegawai,['kode' => $kode]);
    }

    public function deleteData($kode)
    {
        return $this->delete($kode);
    }

}
