<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HistoryHeader extends Migration
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
            'periode_awal'=> [
                'type' => 'DATE'
            ],
            'periode_akhir' => [
                'type' => 'DATE'
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
        $this->forge->createTable('historyheader');
    }

    public function down()
    {
        $this->forge->dropTable('historyheader');
    }
}
