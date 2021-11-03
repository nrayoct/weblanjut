<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table                = 'posts'; #mendefinisikan tabel kita ngarah ke mana
    protected $primaryKey           = 'posts_id'; #sesuaiin dg PK yg udh d buat
    protected $allowedFields        = ['judul', 'deskripsi', 'gambar', 'author', 'kategori', 'slug', 'created_at', 'updated_at']; #bisa diisi dg fiel2 apa yg bs di akses di tabel kita
    protected $useTimestamps        = true; #ini tiap ada perubahan data otomatis akan diisi o/ aplikasi, otomatis di update

    public function getPosts($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
