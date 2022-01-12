<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\PegawaiModel;
use App\Models\HistoryHeaderModel;
use App\Models\HistoryDetailModel;

class Perhitungan extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $kriteriaModel = new KriteriaModel();
        $alternatifModel = new AlternatifModel();
        $data['title'] = 'Perhitungan';
        $data['jumlah'] = $kriteriaModel->selectSum('bobot')->first();
        $data['pegawais'] = $pegawaiModel->orderBy('created_at', 'ASC')->get()->getResultArray();
        $data['kriterias'] = $kriteriaModel->findAll();
        $data['alternatifs'] = $alternatifModel->findAll();
        $jumlahAlternatif = $alternatifModel->countAll();
        $jumlahData = $pegawaiModel->countAll() * $kriteriaModel->countAll();
        if($jumlahData !== $jumlahAlternatif) {
            session()->setFlashdata('warning', 'Data Alternatif belum lengkap, mohon lengkapi terlebih dahulu!');
           return redirect()->to(base_url('alternatif'));
        }
        return view('perhitungan/index', $data);
    }

    public function store()
    {
        $historyHeaderModel = new HistoryHeaderModel();
        $historyDetailModel = new HistoryDetailModel();
        $pegawaiModel = new PegawaiModel();
        $historyHeaderModel->save([
            'periode_awal' => $this->request->getPost('periode_awal'),
            'periode_akhir' => $this->request->getPost('periode_akhir'),
        ]);
        $vektors = $this->request->getPost('vektors');
        $fkHistory = $historyHeaderModel->selectMax('id')->first();
        $pegawais = $pegawaiModel->findAll();
        $ranking = 1;
        foreach($vektors as $key => $vektor){
            foreach($pegawais as $pegawai){
                if($key == $pegawai['kode']){
                    $historyDetailModel->save([
                        'nama' => $pegawai['nama'],
                        'hasil_akhir' => doubleval($vektor),
                        'ranking' => $ranking++,
                        'header_id' => $fkHistory['id']
                    ]);
                }
            }
        }
        return redirect()->to(base_url('perhitungan'));
    }
}
