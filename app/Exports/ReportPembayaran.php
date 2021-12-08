<?php

namespace App\Exports;

use App\Pembayaran;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportPembayaran implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('pembayaran.report', [
            'pembayaran' => Pembayaran::orderBy('created_at')->get()
        ]);
    }
}