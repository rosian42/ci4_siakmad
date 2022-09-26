<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_guru' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' =>true
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tmp_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
                'null' => true
            ],
            'alamat' => [
                'type' => 'longtext',
                'null' => true
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
                'unique' => true
            ],
            'foto' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true
            ],
            'id_mapel' => [
                'type' => 'int',
                'constraint' => 4,
                'null' => true
            ]
        ]);

        $this->forge->addForeignKey('email', 'admin', 'email');
        $this->forge->addKey('id_guru', true);
        $this->forge->createTable('tb_guru');

    }

    public function down()
    {
        $this->forge->dropTable('tb_guru');
    }
}
