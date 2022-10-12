<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbDetailKurikulum extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kurikulum_detail' =>[
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'id_kurikulum' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true
            ],
            'id_mapel' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true
            ],
            'id_tingkat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ]
        ]);
        
        $this->forge->addKey('id_kurikulum_detail', true);
        $this->forge->createTable('tb_kurikulum_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kurikulum_detail');
    }
}
