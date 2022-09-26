<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TingkatanKelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tingkatan_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'nm_tingkatan_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);

        $this->forge->addKey('id_tingkatan_kelas', true);
        $this->forge->createTable('tb_tingkatan_kelas');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tingkatan_kelas');
    }
}
