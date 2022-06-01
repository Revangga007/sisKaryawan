<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
 public function __construct()
    {
        $this->title = 'Users';
        $this->model = new UserModel();
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['users'] = $this->model->findAll();
        return view('users/index', $data);
    }

    public function create() 
    {
        $data['title'] = $this->title;
        session();
        $data['validation'] = \Config\Services::validation();
        return view('users/create', $data);
    }

    public function store()
    {
       $validation = \Config\Services::validation();
       $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
       $user = [
           'nama'   => $this->request->getPost('nama'),
           'username'  => $this->request->getPost('username'),
           'password'  => $password,
           'role' => $this->request->getPost('role'),
       ];
       if($validation->run($user, 'user')){
           $this->model->save($user);
           session()->setFlashdata('success', 'Data user berhasil disimpan');
           return redirect()->to(base_url('users'));
       } else {
            return redirect()->to(base_url('users/create'))->withInput()->with('validation', $validation);
       }
    }

    public function edit($id)
    {
        session();
        $data['title'] = $this->title;
        $data['user'] = $this->model->where(['id' => $id])->first();
        $data['validation'] = \Config\Services::validation();
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $user = [
           'id' => $id,
           'nama'   => $this->request->getPost('nama'),
           'username'  => $this->request->getPost('username'),
           'password'  => $this->request->getPost('password'),
           'role' => $this->request->getPost('role'),
        ];
        if($validation->run($user, 'user')){
           $this->model->save($user);
           session()->setFlashdata('success', 'Data user berhasil diupdate');
           return redirect()->to(base_url('users'));
        } else {
            return redirect()->to(base_url('users/edit/'.$id))->withInput()->with('validation', $validation);
        }
    }

    public function delete($kode)
    {
        $this->model->delete($kode);
        session()->setFlashdata('success', 'Data user berhasil dihapus');
        return redirect()->to(base_url('users'));
    }

    public function editPassword($id)
    {
        session();
        $data['title'] = $this->title;
        $data['user'] = $this->model->where(['id' => $id])->first();
        $data['validation'] = \Config\Services::validation();
        return view('users/editPassword', $data);
    }

    public function updatePassword($id)
    {
        if($this->request->getPost('password') == $this->request->getPost('password-confirm'))
        {
            $validation = \Config\Services::validation();
            $user = [
                'id'      => $id,
                'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            if($validation->run($user, 'editpassword')){
            $this->model->save($user);
            session()->setFlashdata('success', 'Password user berhasil diupdate');
            return redirect()->to(base_url('users'));
            } else {
                return redirect()->to(base_url('users/edit-password/'.$id))->withInput()->with('validation', $validation);
            }
        } else {
            session()->setFlashdata('danger', 'Konfirmasi password tidak sesuai');
            return redirect()->to(base_url('users/edit-password/'.$id));
        }
    }
}
