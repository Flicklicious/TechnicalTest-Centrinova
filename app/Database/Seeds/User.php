<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        date_default_timezone_set("Asia/Jakarta");
        $currentDate = date("Y-m-d\TH:i:s");

        $data =
        [
            'Username' => 'Regar',
            'password' => password_hash('Admin123', PASSWORD_DEFAULT),
            'Level' => 'Karyawan',
            'FullName' => 'Regar Chairul Sholeh',
            'Email' => 'regarchairul552@gmail.com',
            'CreatedDate' => $currentDate,
            'CreatedBy' => 'flicklicious'
        ];
        $this->db->table('user')->insert($data);
    }
}
