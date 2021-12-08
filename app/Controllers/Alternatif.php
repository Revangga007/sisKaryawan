<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\PegawaiModel;
use App\Models\KriteriaModel;

class Alternatif extends BaseController
{
    public function __construct()
    {
        $this->title = 'Alternatif';
        $this->model = new AlternatifModel();
        $this->modelPegawai = new PegawaiModel();
        $this->modelKriteria = new KriteriaModel();
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['pegawais'] = $this->modelPegawai->findAll();
        return view('alternatif/index', $data);
    }
    
    public function show($kode){
        $data['title'] = $this->title;
        $data['pegawai'] = $this->modelPegawai->where(['kode' => $kode])->first();
        $data['kriterias'] = $this->modelKriteria->findAll();
        $data['alternatifs'] = $this->model->where(['kode_pegawai' => $kode])->get()->getResultArray();
        $data['unSelected'] = $this->modelKriteria->unSelected();
        return view('alternatif/show', $data);
    }

    public function update($id)
    {
        $data = $this->model->select('kode_pegawai')->where(['id' => $id])->first();
        // $nilai_kriteria = ($this->request->getPost('nilai_kriteria'));
        $this->model->save([
            'id' => $id,
            'nilai_kriteria' => $this->request->getPost('nilai_kriteria')
        ]);
        session()->setFlashdata('success', 'Data alternatif berhasil diubah');
        return redirect()->to(base_url('alternatif/show/'.$data['kode_pegawai']));
    }

    public function delete($id)
    {
        $data = $this->model->select('kode_pegawai')->where(['id' => $id])->first();
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data alternatif berhasil dihapus');
        return redirect()->to(base_url('alternatif/show/'.$data['kode_pegawai']));
    }
}
