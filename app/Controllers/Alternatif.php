<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;

class Alternatif extends BaseController
{
    public function __construct()
    {
        $this->title = 'Alternatif';
        $this->model = new AlternatifModel();
    }
    public function index()
    {
        $data['title'] = $this->title;
        return view('alternatif/index', $data);
    }
}
