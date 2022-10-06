<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifikasiTbMapel extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_mapel', [
            'kd_mapel' =>[
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' =>true,
                'after' => 'id_mapel'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_mapel', 'kd_mapel');
    }
}
