<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbKurikulum extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kurikulum' => [
                'type' => 'INT',
                'constraint' => 4,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nm_kurikulum' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'is_aktif' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'default' => 'N'
            ]
        ]);

        $this->forge->addKey('id_kurikulum', true);
        $this->forge->createTable('tb_kurikulum');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kurikulum');
    }
}
