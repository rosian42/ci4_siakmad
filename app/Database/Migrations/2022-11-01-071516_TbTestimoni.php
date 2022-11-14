<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTestimoni extends Migration
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
            'testimoni_name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'testimoni_position' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'testimoni_img' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'testimoni_content' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'is_aktif' => [
                'type' => 'enum',
                'constraint' => ['Y','N']
            ],
            'created_at timestamp default now()',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_testimoni');
    }

    public function down()
    {
        $this->forge->dropTable('tb_testimoni');
        
    }
}
