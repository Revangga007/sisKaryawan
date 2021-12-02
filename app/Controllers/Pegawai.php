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
        $data['pegawais'] = $this->model->getData();
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
       $pegawai = [
           'kode'   => $this->request->getPost('kode'),
           'nama'   => $this->request->getPost('nama'),
           'jekel'  => $this->request->getPost('jekel'),
           'no_hp'  => $this->request->getPost('no_hp'),
           'alamat' => $this->request->getPost('alamat'),
           'jabatan'=> $this->request->getPost('jabatan')
       ];
       if($validation->run($pegawai, 'pegawai')){
           $this->model->storeData($pegawai);
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
        $data['pegawai'] = $this->model->getData($kode)->getRowArray();
        $data['validation'] = \Config\Services::validation();
        return view('pegawai/edit', $data);
    }

    public function update($kode)
    {
        $validation = \Config\Services::validation();
        $pegawai = [
           'kode'   => $this->request->getPost('kode'),
           'nama'   => $this->request->getPost('nama'),
           'jekel'  => $this->request->getPost('jekel'),
           'no_hp'  => $this->request->getPost('no_hp'),
           'alamat' => $this->request->getPost('alamat'),
           'jabatan'=> $this->request->getPost('jabatan')
        ];
        if($validation->run($pegawai, 'pegawai')){
           $this->model->updateData($pegawai,$kode);
           session()->setFlashdata('success', 'Data pegawai berhasil diupdate');
           return redirect()->to(base_url('pegawai'));
        } else {
            return redirect()->to(base_url('pegawai/edit/'.$kode))->withInput()->with('validation', $validation);
        }
    }

    public function delete($kode)
    {
        $this->model->deleteData($kode);
        session()->setFlashdata('success', 'Data pegawai berhasil dihapus');
        return redirect()->to(base_url('pegawai'));
    }
}
