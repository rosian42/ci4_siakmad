<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTbSiswa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_siswa', [
            'tgl_daftar' =>[
                'type' => 'date',
                'default' => null,
                'after' => 'th_masuk'
            ],
            'no_pendaftaran' =>[
                'type' => 'VARCHAR',
                'constraint' => 20,
                'after' => 'tgl_daftar'
            ],
            'is_calon_siswa_baru' =>[
                'type' => 'enum',
                'constraint' => ['Y','N'],
                'after' => 'no_pendaftaran'
            ],
            'is_pindahan' =>[
                'type' => 'enum',
                'constraint' => ['Y','N'],
                'after' => 'is_calon_siswa_baru'
            ],
            'tgl_masuk' =>[
                'type' => 'date',
                'default' => null,
                'after' => 'stat_pd'
            ],
            'tgl_keluar' =>[
                'type' => 'date',
                'default' => null,
                'after' => 'tgl_masuk'
            ],
            'alasan_keluar' =>[
                'type' => 'varchar',
                'constraint' => 255,
                'after' => 'tgl_keluar'
            ],


        ]);
    }

    public function down()
    {
        //
    }
}
