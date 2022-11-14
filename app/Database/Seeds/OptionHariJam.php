<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OptionHariJam extends Seeder
{
    public function run()
    {
        $data =[
            
            [
                'opt_group' => 'hari',
                'opt_id' => 3,
                'opt_val' => 'Senin'
            ],
            [
                'opt_group' => 'hari',
                'opt_id' => 4,
                'opt_val' => 'Selasa'
            ],
            [
                'opt_group' => 'hari',
                'opt_id' => 5,
                'opt_val' => 'Rabu'
            ],
            [
                'opt_group' => 'hari',
                'opt_id' => 6,
                'opt_val' => 'Kamis'
            ],
            [
                'opt_group' => 'hari',
                'opt_id' => 7,
                'opt_val' => 'Jum`at'
            ],
            [
                'opt_group' => 'hari',
                'opt_id' => 1,
                'opt_val' => 'Sabtu'
            ],
            [
                'opt_group' => 'hari',
                'opt_id' => 2,
                'opt_val' => 'Ahad'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 1,
                'opt_val' => '07.15 - 07.50'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 2,
                'opt_val' => '07.50 - 08.25'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 3,
                'opt_val' => '08.25 - 09.00'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 4,
                'opt_val' => '09.00 - 09.35'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 5,
                'opt_val' => '10.05 - 10.40'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 6,
                'opt_val' => '10.40 - 11.15'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 7,
                'opt_val' => '11.15 - 11.50'
            ],
            [
                'opt_group' => 'jam_pelajaran',
                'opt_id' => 8,
                'opt_val' => '11.50 - 12.25'
            ]
        ];
        $this->db->table('tb_option')->insertBatch($data);
    }
}
