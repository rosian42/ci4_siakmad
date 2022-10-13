<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTableSiswa extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_siswa', [
            'nik' =>[
                'type' => 'VARCHAR',
                'constraint' => 16,
                'unique' =>true,
                'after' => 'nisn'
            ],
            'gender' => [
                'type' => 'enum',
                'constraint' => ['L','P'],
                'after' => 'tgl_lahir'
            ],
            'alamat' => [
                'type' => 'varchar',
                'constraint' => 255,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'desa' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'kec' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'kab' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'prop' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'kodepos' => [
                'type' => 'varchar',
                'constraint' => 5,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'jml_saudara' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'asal_sekolah' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' => true
            ],
            'transportasi' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'kks_pip_pkh' => [
                'type' => 'enum',
                'constraint' => ['Y', 'N'],
                'before' => 'foto_siswa'
            ],
            'no_kks_pip_pkh' => [
                'type' => 'varchar',
                'constraint' => 30,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'jns_tinggal' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true

            ],
            'nm_pondok' => [
                'type' => 'varchar',
                'constraint' => 255,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'alamat_domisili' => [
                'type' => 'varchar',
                'constraint' => 255,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'jarak' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'no_kk' => [
                'type' => 'int',
                'constraint' => 16,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'nm_ayah' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'nik_ayah' => [
                'type' => 'int',
                'constraint' => 16,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'stts_ayah' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'hp_ayah' => [
                'type' => 'varchar',
                'constraint' => 14,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'kerja_ayah' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'pddk_ayah' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'penghasilan_ayah' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'nm_ibu' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'nik_ibu' => [
                'type' => 'int',
                'constraint' => 16,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'stts_ibu' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'hp_ibu' => [
                'type' => 'varchar',
                'constraint' => 14,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'kerja_ibu' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'pddk_ibu' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'penghasilan_ibu' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'nm_wali' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'hub_wali' => [
                'type' => 'varchar',
                'constraint' => 100,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'nik_wali' => [
                'type' => 'int',
                'constraint' => 16,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'stts_wali' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'hp_wali' => [
                'type' => 'varchar',
                'constraint' => 14,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'kerja_wali' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ],
            'penghasilan_wali' => [
                'type' => 'int',
                'constraint' => 2,
                'before' => 'foto_siswa',
                'null' =>true
            ]
        ]);
        $this->forge->modifyColumn('tb_siswa',
            [
                'id_siswa' => [
                    'type' => 'VARCHAR',
                    'constraint' => 36
                ]
            ]
        );
    }

    public function down()
    {
        
    }
}
