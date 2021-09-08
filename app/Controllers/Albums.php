<?php

namespace App\Controllers;

use \App\Models\AlbumsModel;;

class Albums extends BaseController
{
    protected $AlbumsModel;
    public function __construct()
    {
        $this->AlbumsModel = new AlbumsModel();
    }

    public function index()
    {
        $data = [
            'title' => "Albums",
            'albums' => $this->AlbumsModel->getAlbums()
        ];

        return view('albums/index', $data);
    }


    public function detail($slug)
    {
        $data = [
            'title' => 'Album Details',
            'albums' => $this->AlbumsModel->getAlbums($slug)

        ];

        if (empty($data['albums'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Album ' . $slug . ' not found.');
        }

        return view('albums/details', $data);
    }



    public function create()
    {
        // session();
        $data = [
            'title' => "New Album Inserted",
            'validation' => \Config\Services::validation()
        ];

        return view('albums/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[albums.title]',
                'errors' => [
                    'required' => '{field} must be filled',
                    'is_unique' => '{field} already exist',
                ]
            ],
            'artist' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  must be filled',
                ]
            ],
            'releaseyear' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} must be filled',
                    'numeric' => 'better filled by number',
                ]
            ],
            'label' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must be filled',
                ]
            ],
            'cover' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} must be filled',
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} must be filled',
                    'numeric' => 'better filled by number',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Albums/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->AlbumsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'artist' => $this->request->getVar('artist'),
            'releaseyear' => $this->request->getVar('releaseyear'),
            'label' => $this->request->getVar('label'),
            'cover' => $this->request->getVar('cover'),
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashdata('message', 'Data Has Been Inserted.');


        return redirect()->to('/albums');
    }
}
