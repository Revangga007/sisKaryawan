<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode' => [
                'type'          => 'VARCHAR',
                'constraint'    => 4,
            ],
            'nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'jekel' => [
                'type'          => 'ENUM',
                'constraint'    => "'Pria', 'Wanita'",
            ],
            'no_hp' => [
                'type'          => 'VARCHAR',
                'constraint'    => 13
            ],
            'alamat'    => [
                'type'          => 'TEXT',
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
        $this->forge->addKey('kode', TRUE);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
