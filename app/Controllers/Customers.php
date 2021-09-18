<?php

namespace App\Controllers;

use \App\Models\CustomersModel;
use phpDocumentor\Reflection\Types\This;

class Customers extends BaseController
{
    protected $CustomersModel;

    public function __construct()
    {
        $this->CustomersModel = new CustomersModel();
    }

    public function index()


    {
        $currentPage = $this->request->getVar('page_customer') ? $this->request->getVar('page_customer') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $customer = $this->CustomersModel->search($keyword);
        } else {
            $customer = $this->CustomersModel;
        }

        $data = [
            'title' => "Customers",
            // 'customers' => $this->CustomersModel->findAll()
            'customers' => $customer->paginate(6, 'customer'),
            'pager' => $this->CustomersModel->pager,
            'currentPage' => $currentPage
        ];

        return view('Customers/index', $data);
    }
}
