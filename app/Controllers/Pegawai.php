<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    public function __construct()
    {
        $this->title = 'Pegawai';
        $this->model = new PegawaiModel();
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['pegawais'] = $this->model->orderBy('created_at', 'ASC')->get()->getResultArray();
        return view('pegawai/index', $data);
    }

    public function create() 
    {
        $data['title'] = $this->title;
        session();
        $jumlahKode = $this->model->countAll();
        if($jumlahKode > 0) {
            $data['generateKode'] = sprintf("A%s", $jumlahKode + 1);
        } else if($jumlahKode == 0) {
            $data['generateKode'] = "A1";
        }
        $data['validation'] = \Config\Services::validation();
        return view('pegawai/create', $data);
    }

    public function store()
    {
       $validation = \Config\Services::validation();
    //    dd($this->request->getPost());
       $pegawai = [
           'kode'       => $this->request->getPost('kode'),
           'nama'       => $this->request->getPost('nama'),
           'jekel'      => $this->request->getPost('jekel'),
           'no_hp'      => $this->request->getPost('no_hp'),
           'alamat'     => $this->request->getPost('alamat'),
           'username'   => $this->request->getPost('username'),
           'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
       ];
       if($validation->run($pegawai, 'pegawai')){
           $this->model->save($pegawai);
           session()->setFlashdata('success', 'Data pegawai berhasil disimpan');
           return redirect()->to(base_url('pegawai'));
       } else {
            return redirect()->to(base_url('pegawai/create'))->withInput()->with('validation', $validation);
       }
    }

    public function edit($kode)
    {
        session();
        $data['title'] = $this->title;
        $data['pegawai'] = $this->model->where(['kode' => $kode])->first();
        $data['validation'] = \Config\Services::validation();
        return view('pegawai/edit', $data);
    }

    public function update($kode)
    {
        $validation = \Config\Services::validation();
        $pegawai = [
           'kode'       => $this->request->getPost('kode'),
           'nama'       => $this->request->getPost('nama'),
           'jekel'      => $this->request->getPost('jekel'),
           'no_hp'      => $this->request->getPost('no_hp'),
           'alamat'     => $this->request->getPost('alamat'),
           'username'   => $this->request->getPost('username'),
           'password'   => $this->request->getPost('password'),

        ];
        if($validation->run($pegawai, 'pegawai')){
           $this->model->save($pegawai,['kode' => $kode]);
           session()->setFlashdata('success', 'Data pegawai berhasil diupdate');
           return redirect()->to(base_url('pegawai'));
        } else {
            return redirect()->to(base_url('pegawai/edit/'.$kode))->withInput()->with('validation', $validation);
        }
    }

    public function delete($kode)
    {
        $this->model->delete($kode);
        session()->setFlashdata('success', 'Data pegawai berhasil dihapus');
        return redirect()->to(base_url('pegawai'));
    }
}
