<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use PDF;

use Excel;
use App\Exports\ReportPembayaran;

class ReportController extends Controller
{
    public function report()
    {
        $cetak = Pembayaran::orderBy('created_at','Desc')->get();
        $pdf = PDF::loadview('pembayaran.report', compact('cetak'));
        return $pdf->stream();
    }

    public function excel()
    {
        $tgl = now();
        return Excel::download(new ReportPembayaran, 'report_pembayaran_'.$tgl.'.xlsx');
    }
}
