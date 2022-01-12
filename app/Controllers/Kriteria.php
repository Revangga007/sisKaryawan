<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    public function __construct()
    {
        $this->title = 'Kriteria';
        $this->model = new KriteriaModel();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['kriterias'] = $this->model->findAll();
        return view('kriteria/index', $data);
    }

    public function create()
    {
        session();
        $jumlahKode = $this->model->countAll();
        if($jumlahKode > 0) {
            $data['generateKode'] = sprintf("C%s", $jumlahKode + 1);
        } else if($jumlahKode == 0) {
            $data['generateKode'] = "C1";
        }
        $data['title'] = $this->title;
        $data['validation'] = \Config\Services::validation();
        return view('kriteria/create', $data);
    }

    public function store()
    {
       $validation = \Config\Services::validation();
       if($this->request->getPost('status') == 'benefit'){
           $bobot = $this->request->getPost('bobot');
       } else {
           $bobot = -($this->request->getPost('bobot'));
       }
       $kriteria = [
           'kode'   => $this->request->getPost('kode'),
           'nama'   => $this->request->getPost('nama'),
           'bobot'  => $bobot,
           'status' => $this->request->getPost('status')
       ];
       if($validation->run($kriteria, 'kriteria')){
           $this->model->save($kriteria);
           session()->setFlashdata('success', 'Data kriteria berhasil disimpan');
           return redirect()->to(base_url('kriteria'));
       } else {
            return redirect()->to(base_url('kriteria/create'))->withInput()->with('validation', $validation);
       }
    }

    public function edit($kode)
    {
        session();
        $data['title'] = $this->title;
        $data['kriteria'] = $this->model->where(['kode' => $kode])->first();
        $data['validation'] = \Config\Services::validation();
        return view('kriteria/edit', $data);
    }

    public function update($kode)
    {
        $validation = \Config\Services::validation();
        if($this->request->getPost('status') == 'benefit'){
            $bobot = $this->request->getPost('bobot');
        } else {
            $bobot = -($this->request->getPost('bobot'));
        }
        $kriteria = [
           'kode'   => $this->request->getPost('kode'),
           'nama'   => $this->request->getPost('nama'),
           'bobot'  => $bobot,
           'status' => $this->request->getPost('status')
        ];
        if($validation->run($kriteria, 'kriteria')){
           $this->model->save($kriteria,['kode' => $kode]);
           session()->setFlashdata('success', 'Data kriteria berhasil diubah');
           return redirect()->to(base_url('kriteria'));
        } else {
            return redirect()->to(base_url('kriteria/edit'.$kode))->withInput()->with('validation', $validation);
        }
    }

    public function delete($kode)
    {
        $this->model->delete($kode);
        session()->setFlashdata('success', 'Data kriteria berhasil dihapus');
        return redirect()->to(base_url('kriteria'));
    }
}
