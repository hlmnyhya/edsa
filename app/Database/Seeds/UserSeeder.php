<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin Kasium',
                'email'    => 'kasiumpolsekjuai@gmail.com',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'level'    => '1',
               
            ],
            [
                'name' => 'Unit SPKT',
                'email'    => 'spktpolsekjuai@gmail.com',
                'password' => password_hash('unit123', PASSWORD_BCRYPT),
                'level'    => '2',
            ],
            [
                'name' => 'Unit Reskrim',
                'email'    => 'reskrimpolsekjuai@gmail.com',
                'password' => password_hash('unit123', PASSWORD_BCRYPT),
                'level'    => '2',
            ],
            [
                'name' => 'Kapolsek',
                'email'    => 'kapolsekpolsekjuai@gmail.com',
                'password' => password_hash('kapolsek123', PASSWORD_BCRYPT),
                'level'    => '3',
            ],
            [
                'name' => 'Satuan Jaga',
                'email'    => 'satuanpolsekjuai@gmail.com',
                'password' => password_hash('satuan123', PASSWORD_BCRYPT),  
                'level'    => '4',            
            ],
            // Tambahkan data pengguna lainnya di sini
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
