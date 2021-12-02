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
        $data['pegawais'] = $this->modelPegawai->getData();
        $data['kriterias'] = $this->modelKriteria->getData();
        return view('alternatif/index', $data);
    }
}
