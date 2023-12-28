<?php

namespace App\Controllers\MasterData;

use App\Controllers\BaseController;
use App\Models\MasterData\UnitStatus;

class UnitStatusController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new UnitStatus();
    }

    public function index()
    {
        $defaultData = $this->DefaultModel->getAllData();
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Unit Status',
            'menu' => 'masterdata',
            'submenu' => 'unit-status' ,
            'page' => 'masterdata/v_unit_status',
            'data' => $defaultData,
        ];
        return view('v_template', $data);
    }

    public function store()
    {
        $data = [
            'status' => $this->request->getPost('status'),
            'description' => $this->request->getPost('description'),
            'active' => 1,
        ];
        $this->DefaultModel->insert($data);
        session()->setFlashdata('message', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('unit-status');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'status' => $this->request->getPost('status'),
            'description' => $this->request->getPost('description'),
            'active' => ($this->request->getPost('active')?1:0),
        ];
        $this->DefaultModel->update($id, $data);
        session()->setFlashdata('message', 'Data Berhasil Diupdate !!');
        return redirect()->to(base_url('unit-status'));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->DefaultModel->delete($id);
        session()->setFlashdata('message', 'Data Berhasil Dihapus !!');
        return redirect()->to(base_url('unit-status'));
    }
}
