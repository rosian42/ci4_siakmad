<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbOption extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'opt_group' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'opt_id' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true
            ],
            'opt_val' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'created_at timestamp default now()',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_option');
    }

    public function down()
    {
        //
    }
}
