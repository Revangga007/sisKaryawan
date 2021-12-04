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
        foreach($data['kriterias'] as $kriteria){
            $data['alternatifs'][] = $this->model->where(['kode_kriteria'=>$kriteria['kode'],'kode_pegawai'=>$kode])->first();
        }
        // dd($data);
        // $data['jmlNilai'] = count($data['alternatif']);
        // $data['alternatifs'] = $this->model->where(['kode_pegawai' => $kode])->get()->getResultArray();
        return view('alternatif/show', $data);
        
        
    }
}
