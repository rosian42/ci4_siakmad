<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbJadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal' =>[
                'type' => 'VARCHAR',
                'constraint' => 36
            ],
            'id_tahun_akademik' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true
            ],
            'semester' => [
                'type' => 'enum',
                'constraint' => ['1','2']
            ],
            'id_tingkat' => [
                'type' => 'INT',
                'constraint' => 2,
                'unsigned' => true
            ],
            'kd_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'id_mapel' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true
            ],
            'id_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 36
            ],
            'hari' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],
            'jam' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],
            'created_at timestamp default now()',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        
        $this->forge->addKey('id_jadwal', true);
        $this->forge->createTable('tb_jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jadwal');
    }
}
