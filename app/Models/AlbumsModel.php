<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table = "albums";
    protected $usetimestamp = "true";

    public function getAlbums($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
