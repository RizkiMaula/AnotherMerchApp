<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = "customer";
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];

    public function search($keyword)
    {
        // $builder = $this->table('customer');
        // $builder->like('name', $keyword);
        // return $builder;

        return $this->table('customer')->like('name', $keyword)->orLike('address', $keyword);
    }
}
