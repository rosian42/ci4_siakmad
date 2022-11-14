<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSlider extends Migration
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
            'slider_img' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'slider_title' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'slider_subtitle' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'slider_description' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'slider_btntext' => [
                'type' => 'varchar',
                'constraint' => 100
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
        $this->forge->createTable('tb_slider');
    }

    public function down()
    {
        $this->forge->dropTable('tb_slider');
        //
    }
}
