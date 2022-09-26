<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterAdmin extends Migration
{
    public function up()
    {
        $this->forge->addColumn('admin', [
            'level INT(2)'
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('admin', 'level');
    }
}
