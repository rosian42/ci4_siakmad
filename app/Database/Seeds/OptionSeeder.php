<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OptionSeeder extends Seeder
{
    public function run()
    {
        $data =[
            
            [
                'opt_group' => 'agama',
                'opt_id' => 1,
                'opt_val' => 'Islam'
            ],
            [
                'opt_group' => 'agama',
                'opt_id' => 2,
                'opt_val' => 'Kristen'
            ],
            [
                'opt_group' => 'agama',
                'opt_id' => 3,
                'opt_val' => 'Katolik'
            ],
            [
                'opt_group' => 'agama',
                'opt_id' => 4,
                'opt_val' => 'Hindu'
            ],
            [
                'opt_group' => 'agama',
                'opt_id' => 5,
                'opt_val' => 'Budha'
            ],
            [
                'opt_group' => 'agama',
                'opt_id' => 6,
                'opt_val' => 'Konghucu'
            ],
            [
                'opt_group' => 'jarak',
                'opt_id' => 1,
                'opt_val' => 'Kurang dari 1 Km'
            ],
            [
                'opt_group' => 'jarak',
                'opt_id' => 2,
                'opt_val' => '1 - 3 Km'
            ],
            [
                'opt_group' => 'jarak',
                'opt_id' => 3,
                'opt_val' => '3 - 5 Km'
            ],
            [
                'opt_group' => 'jarak',
                'opt_id' => 4,
                'opt_val' => '5 - 10 Km'
            ],
            [
                'opt_group' => 'jarak',
                'opt_id' => 5,
                'opt_val' => 'Lebih dari 10 Km'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 1,
                'opt_val' => 'Jalan Kaki'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 2,
                'opt_val' => 'Sepeda'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 3,
                'opt_val' => 'Sepeda Motor'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 4,
                'opt_val' => 'Mobil Pribadi'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 5,
                'opt_val' => 'Antar Jemput Sekolah'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 6,
                'opt_val' => 'Angkutan Umum'
            ],
            [
                'opt_group' => 'transportasi',
                'opt_id' => 7,
                'opt_val' => 'Lainnya'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 1,
                'opt_val' => 'Tidak berpendidikan formal'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 2,
                'opt_val' => '<= SLTP'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 3,
                'opt_val' => 'SLTA'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 4,
                'opt_val' => 'D1'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 5,
                'opt_val' => 'D2'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 6,
                'opt_val' => 'D3'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 7,
                'opt_val' => 'D4'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 8,
                'opt_val' => 'S1'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 9,
                'opt_val' => 'S2'
            ],
            [
                'opt_group' => 'jenjang_pendidikan',
                'opt_id' => 10,
                'opt_val' => 'S3'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 1,
                'opt_val' => 'Tidak bekerja (Di rumah saja)'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 2,
                'opt_val' => 'Pensiunan / Almarhum'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 3,
                'opt_val' => 'PNS (Selain Guru/Dosen/Dokter/Bidan/Perawat'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 4,
                'opt_val' => 'TNI/Polisi'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 5,
                'opt_val' => 'Guru/Dosen'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 6,
                'opt_val' => 'Pegawai Swasta'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 7,
                'opt_val' => 'Pengusaha/Wiraswasta'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 8,
                'opt_val' => 'Pengacara/Hakim/Jaksa/Notaris'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 9,
                'opt_val' => 'Seniman/Pelukis/Artis/Sejenis'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 10,
                'opt_val' => 'Dokter/Bidan/Perawat'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 11,
                'opt_val' => 'Pilot/Pramugari'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 12,
                'opt_val' => 'Pedagang'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 13,
                'opt_val' => 'Petani/Peternak'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 14,
                'opt_val' => 'Nelayan'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 15,
                'opt_val' => 'Buruh (Tani/Pabrik/Bangunan)'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 16,
                'opt_val' => 'Sopir/Masinis/Kondektur'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 17,
                'opt_val' => 'Politikus'
            ],
            [
                'opt_group' => 'jenis_pekerjaan',
                'opt_id' => 18,
                'opt_val' => 'Lainnya'
            ],
            [
                'opt_group' => 'penghasilan',
                'opt_id' => 1,
                'opt_val' => '<= Rp. 500.000'
            ],
            [
                'opt_group' => 'penghasilan',
                'opt_id' => 2,
                'opt_val' => 'Rp. 500.001 - Rp. 1.000.000'
            ],
            [
                'opt_group' => 'penghasilan',
                'opt_id' => 3,
                'opt_val' => 'Rp. 1.000.001 - Rp. 2.000.000'
            ],
            [
                'opt_group' => 'penghasilan',
                'opt_id' => 4,
                'opt_val' => 'Rp. 2.000.001 - Rp. 3.000.000'
            ],
            [
                'opt_group' => 'penghasilan',
                'opt_id' => 5,
                'opt_val' => 'Rp. 3.000.001 - Rp. 5.000.000'
            ],
            [
                'opt_group' => 'penghasilan',
                'opt_id' => 6,
                'opt_val' => '> Rp. 5.000.000'
            ],
            [
                'opt_group' => 'status_ortu',
                'opt_id' => 1,
                'opt_val' => 'Masih Hidup'
            ],
            [
                'opt_group' => 'status_ortu',
                'opt_id' => 2,
                'opt_val' => 'Sudah Meninggal'
            ],
            [
                'opt_group' => 'status_ortu',
                'opt_id' => 3,
                'opt_val' => 'Tidak Diketahui'
            ],
            [
                'opt_group' => 'jenis_tinggal',
                'opt_id' => 1,
                'opt_val' => 'Bersama orang tua'
            ],
            [
                'opt_group' => 'jenis_tinggal',
                'opt_id' => 2,
                'opt_val' => 'Wali'
            ],
            [
                'opt_group' => 'jenis_tinggal',
                'opt_id' => 3,
                'opt_val' => 'Kos'
            ],
            [
                'opt_group' => 'jenis_tinggal',
                'opt_id' => 4,
                'opt_val' => 'Asrama Pesantren'
            ],
            [
                'opt_group' => 'jenis_tinggal',
                'opt_id' => 5,
                'opt_val' => 'Panti Asuhan'
            ],
            [
                'opt_group' => 'jenis_tinggal',
                'opt_id' => 6,
                'opt_val' => 'Lainnya'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 1,
                'opt_val' => 'Aktif'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 2,
                'opt_val' => 'Lulus'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 3,
                'opt_val' => 'Mutasi'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 4,
                'opt_val' => 'Dikeluarkan'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 5,
                'opt_val' => 'Mengundurkan Diri'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 6,
                'opt_val' => 'Putus Sekolah'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 7,
                'opt_val' => 'Meninggal'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 8,
                'opt_val' => 'Hilang'
            ],
            [
                'opt_group' => 'status_siswa',
                'opt_id' => 9,
                'opt_val' => 'Lainnya'
            ],
            [
                'opt_group' => 'gender',
                'opt_id' => 1,
                'opt_val' => 'Laki-laki'
            ],
            [
                'opt_group' => 'gender',
                'opt_id' => 2,
                'opt_val' => 'Perempuan'
            ]
        ];
        $this->db->table('tb_option')->insertBatch($data);
    }
}
