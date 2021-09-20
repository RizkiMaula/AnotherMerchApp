<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table = "albums";
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'artist', 'releaseyear', 'label', 'cover', 'price'];

    public function getAlbums($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('albums')->like('title', $keyword)->orLike('artist', $keyword)->orLike('releaseyear', $keyword)->orLike('label', $keyword)->orLike('price', $keyword);
    }
}
