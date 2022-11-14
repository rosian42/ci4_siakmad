<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbPost extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            
            'post_keyword' =>[
                'type' => 'varchar',
                'constraint' => 255,
                'after' => 'post_content'
            ]

        ]);
    }

    public function down()
    {
        //
    }
}
