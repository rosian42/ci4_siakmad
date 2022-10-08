<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifikasiTbGuru extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('tb_guru',
            [
                'id_guru' => [
                    'type' => 'VARCHAR',
                    'constraint' => 36
                ]
            ]
        );
    }

    public function down()
    {
        //
    }
}
