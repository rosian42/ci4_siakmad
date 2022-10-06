<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifikasiTbMapel extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_mapel', ['kd_mapel VARCHAR(10)']);
    }

    public function down()
    {
        //
    }
}
