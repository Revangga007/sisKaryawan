<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryHeaderModel;
use App\Models\HistoryDetailModel;
use Dompdf\Dompdf;

class History extends BaseController
{
    public function __construct()
    {
        $this->title = 'History';
        $this->modelHeader = new HistoryHeaderModel();
        $this->modelDetail = new HistoryDetailModel();

    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['histories'] = $this->modelHeader->orderBy('id', 'DESC')->get()->getResultArray();
        return view('history/index', $data);

    }

    public function generate($id)
    {
        $data['header'] = $this->modelHeader->where(['id' => $id])->first();
        $data['detail'] = $this->modelDetail->where(['header_id' => $id])->get()->getResultArray();
        $filename = date('y-m-d-H-i-s'). '-karyawan-terbaik';
        $dompdf = new Dompdf();
        $dompdf->setBasePath(base_url('assets/css/sb-admin-2.css'));
        $dompdf->loadHtml(view('history/laporan', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, ['Attachment' => 0]);
    }

    public function delete($id)
    {
        $this->modelDetail->delete(['header_id' => $id]);
        $this->modelHeader->delete($id);
        return redirect()->to(base_url('history'));
    }
}
