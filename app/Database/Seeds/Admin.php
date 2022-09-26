<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data =[
            
            'username' => 'admin',
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Rifky Rosian An Nur',
            'email' => 'rosian42@gmail.com'
        ];
        $this->db->table('admin')->insert($data);
    }
}
