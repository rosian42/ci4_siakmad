<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbPost extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('posts',
            [
                'post_type' => [
                    'type' => 'ENUM',
                'constraint' => ['artikel', 'page', 'agenda', 'pengumuman'],
                'default' => 'artikel'
                ]
            ]
        );
    }

    public function down()
    {
        //
    }
}
