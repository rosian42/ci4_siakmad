<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbJurusan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_jurusan' => [
                'type' =>'VARCHAR',
                'constraint' => 10
            ],
            'nm_jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ]
        ]);

        $this->forge->addKey('kd_jurusan', true);
        $this->forge->createTable('tb_jurusan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jurusan');
    }
}
