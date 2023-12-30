<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier;
use App\Models\MasterData\SupplierStatus;

class SupplierController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new Supplier();
        $this->DefaultStatusModel = new SupplierStatus();
    }

    public function index()
    {
        $defaultData = $this->DefaultModel->getAllData();
        $DefaultStatusData = $this->DefaultStatusModel->getAllData();
        $data = [
            'judul' => 'Supplier',
            'subjudul' => '',
            'menu' => 'supplier',
            'submenu' => '' ,
            'page' => 'v_supplier',
            'data' => $defaultData,
            'dataStatus' => $DefaultStatusData,
        ];
        return view('v_template', $data);
    }

    public function store()
    {
        $data = [
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
        return redirect()->to('supplier');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
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
        return redirect()->to(base_url('supplier'));
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
        return redirect()->to(base_url('supplier'));
    }
}
