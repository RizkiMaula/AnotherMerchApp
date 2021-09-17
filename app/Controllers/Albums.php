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
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => "pict size doens't fit",
                    'is_image' => "This file doesn't a pict",
                    'mime_in' => "This file doesn't a pict",

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
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Albums/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Albums/create')->withInput();
        }

        //get pict
        $getpict = $this->request->getFile('cover');

        //is pict upload?

        if ($getpict->getError() == 4) {
            $pictname = 'adefault.jpg';
        } else {
            //generate random name
            $pictname = $getpict->getRandomName();

            //move pict to img folder
            $getpict->move('img', $pictname);
        }


        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->AlbumsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'artist' => $this->request->getVar('artist'),
            'releaseyear' => $this->request->getVar('releaseyear'),
            'label' => $this->request->getVar('label'),
            'cover' => $pictname,
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashdata('message', 'Data Has Been Inserted.');


        return redirect()->to('/albums');
    }

    public function delete($id)
    {

        //find image by id
        $img = $this->AlbumsModel->find($id);

        //if img = default
        if ($img['cover'] != 'adefault.jpg') {
            //delete image
            unlink('img/' . $img['cover']);
        }

        $this->AlbumsModel->delete($id);

        session()->setFlashdata('message', 'Data Has Been Deleted.');

        return redirect()->to('/albums');
    }

    public function edit($slug)
    {
        $data = [
            'title' => "Album Edit",
            'validation' => \Config\Services::validation(),
            'albums' => $this->AlbumsModel->getAlbums($slug)
        ];

        return view('albums/edit', $data);
    }

    public function update($id)
    {
        //validation
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[albums.title,slug,{slug}]',
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
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => "pict size doens't fit",
                    'is_image' => "This file doesn't a pict",
                    'mime_in' => "This file doesn't a pict",

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
            return redirect()->to('/Albums/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $coverFile = $this->request->getFile('cover');

        //is still using old cover?
        if ($coverFile->getError() == 4) {
            $cover = $this->request->getVar('oldCover');
        } else {
            //generate random file name
            $cover = $coverFile->getRandomName();
            //upload cover
            $coverFile->move('img', $cover);
            //delete old file
            unlink('img/' . $this->request->getVar('oldCover'));
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->AlbumsModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'artist' => $this->request->getVar('artist'),
            'releaseyear' => $this->request->getVar('releaseyear'),
            'label' => $this->request->getVar('label'),
            'cover' => $cover,
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashdata('message', 'Data Has Been Updated.');


        return redirect()->to('/albums');
    }
}
