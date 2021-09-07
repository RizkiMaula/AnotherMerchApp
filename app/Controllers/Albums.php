<?php

namespace App\Controllers;

use \App\Models\AlbumsModel;

class Albums extends BaseController
{
    protected $AlbumsModel;
    public function __construct()
    {
        $this->AlbumsModel = new AlbumsModel();
    }

    public function index()
    {
        // $guns = $this->gunsModel->findAll();
        $data = [
            'title' => "Albums",
            'albums' => $this->AlbumsModel->getAlbums()
        ];

        //konek db tanpa model
        // $db = \Config\Database::connect();
        // $guns = $db->query("SELECT * FROM gunsnroses");
        // foreach ($guns->getResultArray() as $row) {
        //     d($row);
        // }

        //konek pakai model
        // $gunsModel = new GunsModel();

        return view('albums/index', $data);
    }


    public function detail($slug)
    {
        $data = [
            'title' => 'Album Details',
            'albums' => $this->AlbumsModel->getAlbums($slug)

        ];

        return view('albums/details', $data);
    }
}
