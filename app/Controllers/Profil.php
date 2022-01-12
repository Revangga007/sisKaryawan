<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\HistoryDetailModel;
use App\Models\PegawaiModel;
use App\Models\KriteriaModel;

class Profil extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $data['title'] = 'Profil';
        $data['pegawai'] = $pegawaiModel->where(['kode' => session('id')])->first();
        return view('pegawai/profil', $data);
    }
    public function ranking()
    {
        $pegawaiModel = new PegawaiModel();
        $historyDetailModel = new HistoryDetailModel();
        $alternatifModel = new AlternatifModel();
        $kriteriaModel = new KriteriaModel();
        $data['title'] = 'Ranking';
        $data['kriterias'] = $kriteriaModel->findAll();
        $data['alternatifs'] = $alternatifModel->where(['kode_pegawai' => session('id')])->get()->getResultArray();
        $data['history_detail'] = $historyDetailModel->where(['nama' => session("nama")])->orderBy('created_at', 'DESC')->first();
        // dd($data);
        return view('pegawai/ranking', $data);
    }
}
