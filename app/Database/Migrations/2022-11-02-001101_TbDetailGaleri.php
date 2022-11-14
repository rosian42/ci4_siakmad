<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbDetailGaleri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'galeri_detail_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'galeri_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'galeri_detail_name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'created_at timestamp default now()',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        
        $this->forge->addForeignKey('galeri_id', 'tb_galeri', 'galeri_id');
        $this->forge->addKey('galeri_detail_id', true);
        $this->forge->createTable('tb_galeri_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tb_galeri_detail');
        //
    }
}
