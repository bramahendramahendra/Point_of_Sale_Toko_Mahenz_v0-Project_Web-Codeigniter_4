<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\MasterData\CategoryStatus;
use App\Libraries\ErrorHandlerLib;

class CategoryController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new Category();
        $this->DefaultStatusModel = new CategoryStatus();
        $this->errorHandler = new ErrorHandlerLib();
    }

    public function index()
    {
        $DefaultStatusData = $this->DefaultStatusModel->getAllData();
        if($DefaultStatusData) {
            $defaultData = $this->DefaultModel->getAllData();
            // var_dump($defaultData);die;
            $data = [
                'judul' => 'Kategori',
                'subjudul' => '',
                'menu' => 'category',
                'submenu' => '' ,
                'page' => 'v_category',
                'data' => $defaultData,
                'dataStatus' => $DefaultStatusData,
            ];
            return view('v_template', $data);
        } else {
            return $this->errorHandler->showError400('category', 'Kategori', 'Kategori Status', 'category-status');
        }
    }

    // public function create()
    // {
    //     return view('v_create_category');
    // }

    public function store()
    {
        $data = [
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ];
        $result = $this->DefaultModel->insert($data);
        if ($result) {
            $message = ['success', 'Data Berhasil Ditambahkan !!'];
        } else {
            $message = ['danger', 'Gagal menambahkan data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to('category');
    }

    // public function edit($id)
    // {
    //     $category = $this->DefaultModel->find($id);
    //     $data = [
    //         'judul' => 'Edit Kategori',
    //         'subjudul' => '',
    //         'menu' => 'category',
    //         'submenu' => '',
    //         'page' => 'v_edit_category',
    //         'data' => $category,
    //     ];
    //     return view('v_template', $data);
    // }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ];
        $result = $this->DefaultModel->update($id, $data);
        if ($result) {
            $message = ['success', 'Data Berhasil Diupdate !!'];
        } else {
            $message = ['danger', 'Gagal mengupdate data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to(base_url('category'));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $result = $this->DefaultModel->delete($id);
        if ($result) {
            $message = ['success', 'Data Berhasil Dihapus !!'];
        } else {
            $message = ['danger', 'Gagal menghapus data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to(base_url('category'));
    }
}
