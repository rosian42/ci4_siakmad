<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbPost extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            
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
