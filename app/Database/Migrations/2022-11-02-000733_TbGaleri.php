<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbGaleri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'galeri_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'galeri_name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'galeri_slug' => [
                'type' => 'varchar',
                'constraint' => 255,
                'unique' =>true
            ],
            'galeri_description' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'galeri_cover' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'created_at timestamp default now()',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        
        $this->forge->addKey('galeri_id', true);
        $this->forge->createTable('tb_galeri');
    }

    public function down()
    {
        $this->forge->dropTable('tb_galeri');
        //
    }
}
