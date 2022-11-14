<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbSiswa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_siswa', [
            'agama' =>[
                'type' => 'int',
                'constraint' => 1,
                'after' => 'gender'
            ]

        ]);
        $this->forge->modifyColumn('tb_siswa',
            [
                'gender' => [
                    'type' => 'enum',
                    'constraint' => ['1','2']
                ]
            ]
        );
    }

    public function down()
    {
        //
    }
}
