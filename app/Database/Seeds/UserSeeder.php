<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new UserModel();
        return $user->insert([
            'nama' => 'admin',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'role' => 'admin'
        ]);
    }
}
