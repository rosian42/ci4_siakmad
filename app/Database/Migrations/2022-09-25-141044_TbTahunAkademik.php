<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTahunAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahun_akademik' => [
                'type' => 'int',
                'constraint' => 4,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'tahun_akademik' => [
                'type' => 'VARCHAR',
                'constraint' => 9
            ],
            'is_aktif' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'default' => 'N'
            ],
            'semester' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2'],
                'default' => '1'

            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'sof_del' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0'
            ]
        ]);

        $this->forge->addKey('id_tahun_akademik', true);
        $this->forge->createTable('tb_tahun_akademik');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tahun_akademik');
    }
}
