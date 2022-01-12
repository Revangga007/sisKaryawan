<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryHeaderModel extends Model
{
    protected $table            = 'historyheader';
    protected $primaryKey       = 'id';
    protected $useTimestamps = true;
    protected $allowedFields    = ['periode_awal', 'periode_akhir'];


}
