<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true
            ],
            'nama'=> [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true
            ],
            'password' => [
                'type'  => 'VARCHAR',
                'constraint' => 255
            ],
            'role' =>[
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
            'updated_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ]
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
