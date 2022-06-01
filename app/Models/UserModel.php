<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useTimestamps = true;
    protected $allowedFields    = ['id', 'nama', 'username', 'password', 'role'];

 
}
