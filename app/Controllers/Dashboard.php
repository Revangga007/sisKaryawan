<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        
        $data['title'] = 'Dashboard';
        $pegawai = new PegawaiModel();
        $data['pegawai'] = $pegawai->countAll();
        $user = new UserModel();
        $data['user'] = $user->countAll();
        $kriteria = new KriteriaModel();
        $data['kriteria'] = $kriteria->countAll();
        return view('dashboard', $data);
    }
}
