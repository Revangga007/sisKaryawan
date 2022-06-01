<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
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
            'kode_pegawai' => [
                'type'          => 'CHAR',
                'constraint'    => 4,   
            ],
            'kode_kriteria' => [
                'type'          => 'CHAR',
                'constraint'    => 2
            ],
            'nilai_kriteria' => [
                'type'          => 'INT',
                'constraint'    => 12,
                'null'          => true
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
        $this->forge->createTable('alternatif');
    }

    public function down()
    {
        $this->forge->dropTable('alternatif');
    }
}
