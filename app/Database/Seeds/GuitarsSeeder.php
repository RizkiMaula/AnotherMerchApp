<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class GuitarsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        // for ($i = 0; $i < 5; $i++) {
        //     $data = [
        //         'type'       => $faker->name,
        //         'address'    => $faker->address,
        //         'created_at' => Time::createFromTimestamp($faker->unixTime()),
        //         'updated_at' => Time::now(),
        //     ];
        //     $this->db->table('customer')->insert($data);
        // }

        $slug = url_title($faker->text(), '-', true);

        for ($i = 0; $i < 100; $i++) {
            $data = [
                'type'       => $faker->word(),
                'vendor'    => $faker->word(),
                'slug'    => $slug,
                'img'    => 'guitar.jpg',
                'price'    => $faker->randomNumber(7, true),
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now(),
            ];
            $this->db->table('guitars')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO Customer (name, address, created_at, updated_at) VALUES(:name:, :address:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // $this->db->table('customer')->insert($data);
    }
}
