<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class CustomerSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'name'       => 'darth',
        //         'address'    => 'Jl Ase No. 123',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ],
        //     [
        //         'name'       => 'han',
        //         'address'    => 'Jl Ase No. 123',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ],
        //     [
        //         'name'       => 'yoda',
        //         'address'    => 'Jl Ase No. 123',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ],
        // ];

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'name'       => $faker->name,
                'address'    => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now(),
            ];
            $this->db->table('customer')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO Customer (name, address, created_at, updated_at) VALUES(:name:, :address:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // $this->db->table('customer')->insert($data);
    }
}
