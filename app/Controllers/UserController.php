<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Employee;
use App\Models\MasterData\UserStatus;
use App\Libraries\ErrorHandlerLib;

class UserController extends BaseController
{
    public function __construct() 
    {
        $this->DefaultModel = new User();
        $this->DefaultStatusModel = new UserStatus();
        $this->EmployeeModel = new Employee();
        $this->errorHandler = new ErrorHandlerLib();
    }

    public function index()
    {
        $DefaultStatusData = $this->DefaultStatusModel->getAllData();
        if($DefaultStatusData) {
            $defaultData = $this->DefaultModel->getAllData();
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
        } else {
            return $this->errorHandler->showError400('user', 'User', 'User Status', 'user-status');
        }
    }

    public function store()
    {
        $db = \Config\Database::connect(); // mendapatkan instance database
        $db->transBegin(); // memulai transaksi

        try {
            $dataUser = [
                'name' => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'status' => $this->request->getPost('status'),
            ];
            $resultUser = $this->DefaultModel->insert($dataUser);

            if ($resultUser) {
                $dataEmployee = [
                    'user_id' => $resultUser,
                    'name' => $this->request->getPost('name'),
                ];
                $resultEmployee = $this->EmployeeModel->insert($dataEmployee);
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                $message = ['danger', 'Gagal menambahkan data.'];
            } else {
                $db->transCommit();
                $message = ['success', 'Data Berhasil Ditambahkan !!'];
            } 
         } catch (\Exception $e) {
            $db->transRollback(); // rollback transaksi jika terjadi exception
            $message = ['danger', 'Exception: ' . $e->getMessage()];
        }
        // var_dump($message);
        // die;
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
