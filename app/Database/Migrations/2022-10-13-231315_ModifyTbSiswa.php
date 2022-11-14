<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbSiswa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_siswa', [
            'th_masuk' =>[
                'type' => 'VARCHAR',
                'constraint' => 10,
                'after' => 'id_siswa'
            ],
            'stat_pd' =>[
                'type' => 'int',
                'constraint' => 2,
                'after' => 'foto_siswa'
            ],

        ]);
    }

    public function down()
    {
        //
    }
}
