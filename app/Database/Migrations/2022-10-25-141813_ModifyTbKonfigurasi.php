<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbKonfigurasi extends Migration
{
    public function up()
    {
        $this->forge->addColumn('konfigurasi', [
            'konfigurasi_group' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'id'
            ],
            'konfigurasi_default' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'konfigurasi_value'
            ],
            'created_at timestamp default now()',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'

        ]);
    }

    public function down()
    {
        //
    }
}
