<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryDetailModel extends Model
{
    protected $table            = 'historydetail';
    protected $primaryKey       = 'id';
    protected $useTimestamps = true;
    protected $allowedFields    = [];
}