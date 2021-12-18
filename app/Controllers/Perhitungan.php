<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\PegawaiModel;

class Perhitungan extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $kriteriaModel = new KriteriaModel();
        $alternatifModel = new AlternatifModel();
        $data['title'] = 'Perhitungan';
        $data['jumlah'] = $kriteriaModel->selectSum('bobot')->first();
        $data['pegawais'] = $pegawaiModel->findAll();
        $data['kriterias'] = $kriteriaModel->findAll();
        $data['alternatifs'] = $alternatifModel->findAll();
        return view('perhitungan/index', $data);
    }
}
