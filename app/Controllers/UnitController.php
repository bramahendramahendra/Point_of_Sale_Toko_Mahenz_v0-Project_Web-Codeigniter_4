<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Unit;
use App\Models\MasterData\UnitStatus;
use App\Libraries\ErrorHandlerLib;

class UnitController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new Unit();
        $this->DefaultStatusModel = new UnitStatus();
        $this->errorHandler = new ErrorHandlerLib();
    }

    public function index()
    {
        $DefaultStatusData = $this->DefaultStatusModel->getAllData();
        if($DefaultStatusData) {
            $defaultData = $this->DefaultModel->getAllData();
            $data = [
                'judul' => 'Satuan',
                'subjudul' => '',
                'menu' => 'unit',
                'submenu' => '' ,
                'page' => 'v_unit',
                'data' => $defaultData,
                'dataStatus' => $DefaultStatusData,
            ];
            return view('v_template', $data);
        } else {
            return $this->errorHandler->showError400('unit', 'Satuan', 'Satuan Status', 'unit-status');
        }
    }

    public function store()
    {
        $data = [
            'unit' => $this->request->getPost('unit'),
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
        return redirect()->to('unit');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'unit' => $this->request->getPost('unit'),
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
        return redirect()->to(base_url('unit'));
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
        return redirect()->to(base_url('unit'));
    }
}
