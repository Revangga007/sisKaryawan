<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'kode_pegawai', 'kode_kriteria', 'nilai_kriteria'];
    protected $useTimestamps    = true;

}
