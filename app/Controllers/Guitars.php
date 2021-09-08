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
                'rules' => 'required',
                'errors' => [
                    'required' => 'this image must be filled',
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
            $validation = \Config\Services::validation();
            return redirect()->to('Guitars/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('type'), '-', true);

        $this->GuitarsModel->save([
            'type' => $this->request->getVar('type'),
            'slug' => $slug,
            'vendor' => $this->request->getVar('vendor'),
            'img' => $this->request->getVar('img'),
            'price' => $this->request->getVar('price'),
        ]);

        session()->setFlashdata('message', 'Data Has Been Inserted.');

        return redirect()->to('/guitars');
    }
}
