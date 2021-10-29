<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class AdminPostsController extends BaseController
{
    //adminpostcontroller utk nampung post2
    public function index()
    {
        $PostModel = model("PostModel");
        $data = [
            'posts' => $PostModel->findAll()
        ];
        return view("posts/index", $data);
    }
    public function create()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view("posts/create", $data);
    }
    public function store()
    {
        $valid = $this->validate([
            "judul" => [
                "label" => "Judul",
                "rules" => "required",
                "errors" => [
                    "required" => "{field} Harus Diisi!",
                ]
            ],
            "slug" => [
                "label" => "Slug",
                "rules" => "required|is_unique[posts.slug]",
                "errors" => [
                    "required" => "{field} Harus Diisi!",
                    "is_unique" => "{field} sudah ada!",
                ]
            ],
            "kategori" => [
                "label" => "Kategori",
                "rules" => "required",
                "errors" => [
                    "required" => "{field} Harus Diisi!",
                ]
            ],
            "author" => [
                "label" => "Author",
                "rules" => "required",
                "errors" => [
                    "required" => "{field} Harus Diisi!",
                ]
            ],
            "deskripsi" => [
                "label" => "Deskripsi",
                "rules" => "required",
                "errors" => [
                    "required" => "{field} Harus Diisi!",
                ]
            ],
        ]);

        if ($valid) {
            $data = [
                'judul' => $this->request->getVar('judul'),
                'slug'  => $this->request->getVar('slug'),
                'kategori'  => $this->request->getVar('kategori'),
                'author'  => $this->request->getVar('author'),
                'deskripsi'  => $this->request->getVar('deskripsi'),
            ];
            $PostModel = model("PostModel");
            $PostModel->insert($data);
            session()->setFlashdata('message', 'Post Has Been Added');
            session()->setFlashdata('alert-class', 'alert-success');
            return redirect()->to(base_url('admin/posts/'));
        } else {
            return redirect()->to(base_url('admin/posts/create'))->withInput()->with('validation', $this->validator);
        }
    }
    public function delete($slug)
    {
        $posts = new PostModel();
        $posts->where(['slug' => $slug])->delete();
        session()->setFlashdata('message', ' Post Deleted Successfully');
        session()->setFlashdata('alert-class', 'alert-danger');
        return redirect()->to(base_url('admin/posts/'));
    }
}
