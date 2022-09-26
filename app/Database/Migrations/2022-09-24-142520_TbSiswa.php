<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'tmp_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'tgl_lahir' => [
                'type' => 'DATE'
            ],
            'foto_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ]
        ]);

        $this->forge->addKey('id_siswa');
        $this->forge->createTable('tb_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_siswa');
    }
}
