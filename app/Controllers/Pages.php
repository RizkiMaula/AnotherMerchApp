<?php

namespace App\Controllers;

// namespace src\autoload;

// use \Faker\Factory;
// when installed via composer
// use vendor\autoload;
// require_once 'vendor/autoload.php';

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Bj Music Store'
        ];
        echo view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Bj Music Store'
        ];
        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact us | Bj Music Store',
            'alamat' => [
                [
                    'tipe' => "Kantor Pusat",
                    'alamat' => "Jalan Party No.32",
                    'kota' => "Kota Administrasi Jakarta Pusat",
                    'telp' => "021-3243-2122"
                ],
                [
                    'tipe' => "kantor Cabang Ceger",
                    'alamat' => "Jalan Ceger No. 12A",
                    'kota' => "Kota Administrasi Jakarta Timur",
                    'telp' => "0818-3232-2212"
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
