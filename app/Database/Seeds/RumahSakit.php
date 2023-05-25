<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RumahSakit extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'nama_rumah_sakit'    => $faker->name,
                'alamat_rumah_sakit'    => $faker->address,
                'deskripsi_rumah_sakit'    => $faker->city,
            ];

            // Using Query Builder
            $this->db->table('rumah_sakit')->insert($data);
        }
    }
}
