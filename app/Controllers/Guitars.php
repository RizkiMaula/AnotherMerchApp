<?php

namespace App\Controllers;

use \App\Models\GuitarsModel;

class Guitars extends BaseController
{
    protected $GuitarsModel;

    public function __construct()
    {
        $this->GuitarsModel = new GuitarsModel();
    }

    public function index()
    {
        $data = [
            'title' => "Guitars",
            'guitars' => $this->GuitarsModel->getGuitars()
        ];

        return view('guitars/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => "Gutar details",
            'guitars' => $this->GuitarsModel->getGuitars($slug)
        ];

        return view('guitars/details', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => "New Guitar insert",
            'validation' => \Config\Services::validation()
        ];

        return view('guitars/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'type' => [
                'rules' => 'required|is_unique[guitars.type]',
                'errors' => [
                    'required' => 'this {field} must be filled',
                    'is_unique' => 'this {field} already exist',
                ]
            ],
            'vendor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'this {field} must be filled',
                ]
            ],
            'img' => [
                'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => "Pict size doesn't fit",
                    'is_image' => "this file doens't a pict",
                    'mime_in' => "this file doens't a pict",
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'this {field} must be filled',
                    'numeric' => 'better filled by number',
                ]
            ],
        ])) {
            return redirect()->to('Guitars/create')->withInput();
        }

        //get pict
        $getpict = $this->request->getFile('img');

        //is pict upload?
        if ($getpict->getError() == 4) {
            $pictname = 'guitar.jpg';
        } else {
            //generate random name
            $pictname = $getpict->getRandomName();

            //move to img folder
            $getpict->move('img', $pictname);
        }

        $slug = url_title($this->request->getVar('type'), '-', true);

        $this->GuitarsModel->save([
            'type' => $this->request->getVar('type'),
            'slug' => $slug,
            'vendor' => $this->request->getVar('vendor'),
            'img' => $pictname,
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashdata('message', 'Data Has Been Inserted.');

        return redirect()->to('/guitars');
    }

    public function delete($id)
    {

        //find image by id
        $img = $this->GuitarsModel->find($id);

        //if img = default
        if ($img['img'] != 'guitar.jpg') {
            //delete image
            unlink('img/' . $img['img']);
        }

        $this->GuitarsModel->delete($id);

        session()->setFlashdata('message', 'Data has been deleted');

        return redirect()->to('/guitars');
    }

    public function edit($slug)
    {
        $data = [
            'title' => "Guitar Data Update",
            'validation' => \Config\Services::validation(),
            'guitars' => $this->GuitarsModel->getGuitars($slug),
        ];

        return view('guitars/edit', $data);
    }

    public function update($id)
    {
        //validation
        if (!$this->validate([
            'type' => [
                'rules' => 'required|is_unique[guitars.type,slug,{slug}]',
                'errors' => [
                    'required' => 'this {field} must be filled',
                    'is_unique' => 'this {field} already exist',
                ]
            ],
            'vendor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'this {field} must be filled',
                ]
            ],
            'img' => [
                'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => "Pict size doesn't fit",
                    'is_image' => "this file doens't a pict",
                    'mime_in' => "this file doens't a pict",
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'this {field} must be filled',
                    'numeric' => 'better filled by number',
                ]
            ],
        ])) {
            return redirect()->to('Guitars/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $imgFile = $this->request->getFile('img');

        //is still using old image?
        if ($imgFile->getError() == 4) {
            $imgName = $this->request->getVar('oldImg');
        } else {
            //generate random image name
            $imgName = $imgFile->getRandomName();
            //upload image
            $imgFile->move('img', $imgName);
            //delete old image
            unlink('img/' . $this->request->getVar('oldImg'));
        }

        $slug = url_title($this->request->getVar('type'), '-', true);

        $this->GuitarsModel->save([
            'id' => $id,
            'type' => $this->request->getVar('type'),
            'slug' => $slug,
            'vendor' => $this->request->getVar('vendor'),
            'img' => $imgName,
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashdata('message', 'Data Has Been Updated.');

        return redirect()->to('/guitars');
    }
}
