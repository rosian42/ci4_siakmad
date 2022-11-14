<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbSiswa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_siswa', [
            'created_at' =>[
                'type' => 'datetime'
            ],
            'updated_at' =>[
                'type' => 'datetime'
            ],
            'deleted_at' =>[
                'type' => 'datetime'
            ]

        ]);
    }

    public function down()
    {
        //
    }
}
