<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbSlider extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_slider', [
            'slider_link' =>[
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'slider_btntext'
            ]

        ]);
    }

    public function down()
    {
        //
    }
}
