<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function __construct() 
    {
        $this->CategoryModel = new Category();
    }

    public function index()
    {
        $categoryData = $this->CategoryModel->getAllData();
        // var_dump($category);
        $data = [
            'judul' => 'Kategori',
            'subjudul' => '',
            'menu' => 'category',
            'submenu' => '' ,
            'page' => 'v_category',
            'data' => $categoryData,
        ];
        return view('v_template', $data);
    }

    public function create()
    {
        return view('v_create_category');
    }

    public function store()
    {
        $data = [
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'status' => 1,
        ];
        $this->CategoryModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('category');
    }

    public function edit($id)
    {
        $category = $this->CategoryModel->find($id);
        $data = [
            'judul' => 'Edit Kategori',
            'subjudul' => '',
            'menu' => 'category',
            'submenu' => '',
            'page' => 'v_edit_category',
            'data' => $category,
        ];
        return view('v_template', $data);
    }

    public function update($id)
    {
        $data = [
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
        ];
        $this->CategoryModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('category'));
    }

    public function delete($id)
    {
        $this->CategoryModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!');
        return redirect()->to(base_url('category'));
    }
}
