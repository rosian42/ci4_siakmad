<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMapel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mapel' => [
                'type' => 'int',
                'constraint' => 4,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nm_mapel' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ]);
        $this->forge->addKey('id_mapel', true);
        $this->forge->createTable('tb_mapel');
    }

    public function down()
    {
        $this->forge->dropTable('tb_mapel');
    }
}
