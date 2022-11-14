<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbPost extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            
            'event_date' =>[
                'type' => 'date',
                'default' => null,
                'after' => 'post_title'
            ]

        ]);
    }

    public function down()
    {
        //
    }
}
