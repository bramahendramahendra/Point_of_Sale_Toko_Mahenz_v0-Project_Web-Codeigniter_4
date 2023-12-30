<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee;
use App\Models\MasterData\EmployeeStatus;

class EmployeeController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new Employee();
        $this->DefaultStatusModel = new EmployeeStatus();
    }

    public function index()
    {
        $defaultData = $this->DefaultModel->getAllData();
        $DefaultStatusData = $this->DefaultStatusModel->getAllData();
        $data = [
            'judul' => 'Pegawai',
            'subjudul' => '',
            'menu' => 'employee',
            'submenu' => '' ,
            'page' => 'v_employee',
            'data' => $defaultData,
            'dataStatus' => $DefaultStatusData,
        ];
        return view('v_template', $data);
    }

    public function store()
    {
        $data = [
            'nik' => $this->request->getPost('nik'),
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'province' => $this->request->getPost('province'),
            'status' => $this->request->getPost('status'),
        ];
        $result = $this->DefaultModel->insert($data);
        if ($result) {
            $message = ['success', 'Data Berhasil Ditambahkan !!'];
        } else {
            $message = ['danger', 'Gagal menambahkan data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to('employee');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nik' => $this->request->getPost('nik'),
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'province' => $this->request->getPost('province'),
            'status' => $this->request->getPost('status'),
        ];
        $result = $this->DefaultModel->update($id, $data);
        if ($result) {
            $message = ['success', 'Data Berhasil Diupdate !!'];
        } else {
            $message = ['danger', 'Gagal mengupdate data.'];
        }
        session()->setFlashdata('message', $message);
        return redirect()->to(base_url('employee'));
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
        return redirect()->to(base_url('employee'));
    }
}
