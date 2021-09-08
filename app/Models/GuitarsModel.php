<?php

namespace App\Models;

use CodeIgniter\Model;

class GuitarsModel extends Model
{
    protected $table = "guitars";
    protected $useTimestamps = true;
    protected $allowedFields = ['type', 'slug', 'img', 'price'];

    public function getGuitars($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
