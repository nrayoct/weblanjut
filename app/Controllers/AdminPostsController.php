<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminPostsController extends BaseController
{
    //adminpostcontroller utk nampung post2
    public function index()
    {
        return view("posts/index");
        //
    }
    public function create()
    {
        return view("posts/create");
    }
    public function store()
    {
    }
}
