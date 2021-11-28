<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode'     => [
                'type'          => 'CHAR',
                'constraint'    => 2,
            ],
            'nama'   => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'bobot' => [
                'type'          => 'DOUBLE',
            ],
            'status'        => [
                'type'          => 'ENUM',
                'constraint'    => "'Benefit', 'Cost'",
                'default'       => 'Benefit'
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
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}
