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
        
    }
}
