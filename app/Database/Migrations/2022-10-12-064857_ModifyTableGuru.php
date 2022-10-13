<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTableGuru extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_guru', [
            'nuptk' =>[
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' =>true,
                'after' => 'nip'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_guru', 'nuptk');
    }
}
