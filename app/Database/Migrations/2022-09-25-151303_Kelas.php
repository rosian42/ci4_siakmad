<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'nm_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'kd_tingkatan' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'kd_jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true
            ]
        ]);
        $this->forge->addForeignKey('kd_tingkatan', 'tb_tingkatan_kelas', 'id_tingkatan_kelas');
        $this->forge->addKey('kd_kelas', true);
        $this->forge->createTable('tb_kelas');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kelas');
    }
}
