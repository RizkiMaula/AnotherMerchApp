<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table = "albums";
    protected $useTimestamps = "true";
    protected $allowedFields = ['title', 'slug', 'artist', 'releaseyear', 'label', 'cover', 'price'];

    public function getAlbums($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
