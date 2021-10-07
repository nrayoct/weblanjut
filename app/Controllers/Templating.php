<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; //ini biar bisa nyimpen ke DB nya, tp perlu dibuat constructornya

class Templating extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel(); //nah ini contruct utk usermodel
    }
    public function index()
    {
        $data = [
            'title' => "Admin"
        ];
        return view('view_admin', $data);
    }
    public function register()
    {
        $data = [
            'title' => "Register"
        ];
        return view('v_register', $data);
    }
    public function saveRegister()
    {
        $request = service('request');
        $data = [
            //penulisan besar kecilnya ngaruh krn dia case sensitive
            //getVar ini utk ambil data dr yg kita buat tadi di form. data apapun, valuenya diambil dari inputan fullname 
            'fullname' => $request->getVar('fullname'),
            'email' => $request->getVar('email'),
            'password' => $request->getVar('password'),
        ];
        //dd($data); //untuk memastikan kalau datanya terinput dengan benar di masing2 field
        $this->userModel->insert($data); //untuk insert data ke dlam usermodel, nanti model akan input data ke tabel
        return redirect()->to('/register');
    }
}
