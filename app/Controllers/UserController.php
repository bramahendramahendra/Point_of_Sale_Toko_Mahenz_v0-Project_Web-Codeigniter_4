<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\MasterData\UserStatus;

class UserController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new User();
        $this->DefaultStatusModel = new UserStatus();
    }

    public function index()
    {
        $defaultData = $this->DefaultModel->getAllData();
        $DefaultStatusData = $this->DefaultStatusModel->getAllData();
        $data = [
            'judul' => 'User',
            'subjudul' => '',
            'menu' => 'user',
            'submenu' => '' ,
            'page' => 'v_user',
            'data' => $defaultData,
            'dataStatus' => $DefaultStatusData,
        ];
        return view('v_template', $data);
    }

    public function store()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status' => $this->request->getPost('status'),
        ];
        $result = $this->DefaultModel->insert($data);
        if ($result) {
            $message = ['success', 'Data Berhasil Ditambahkan !!'];
        } else {
            $message = ['danger', 'Gagal menambahkan data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to('user');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status' => $this->request->getPost('status'),
        ];
        $result = $this->DefaultModel->update($id, $data);
        if ($result) {
            $message = ['success', 'Data Berhasil Diupdate !!'];
        } else {
            $message = ['danger', 'Gagal mengupdate data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to(base_url('user'));
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
        return redirect()->to(base_url('user'));
    }
}
