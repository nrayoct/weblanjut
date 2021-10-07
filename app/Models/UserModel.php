<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table                = 'user'; #mendefinisikan tabel kita ngarah ke mana
    protected $primaryKey           = 'user_id'; #sesuaiin dg PK yg udh d buat
    protected $allowedFields        = ['fullname', 'email', 'password']; #bisa diisi dg field2 apa yg bs di akses di tabel kita
    //protected $useTimestamps        = true; #ini tiap ada perubahan data otomatis akan diisi o/ aplikasi, otomatis di update
}
