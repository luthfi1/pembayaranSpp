<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Siswa;
use App\User;
use Validator;
use PDF;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pembayaran = Pembayaran::paginate(5);
        $siswa = Siswa::all();
        $user = User::all();
        return view('pembayaran.index', compact('pembayaran','siswa','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $user = User::all();
        return view('pembayaran.create', compact('siswa','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_siswa' => 'required',
            'tanggal_bayar' => 'required',
            'bulan_bayar' => 'required',
        ]);
        $siswa = Siswa::find($request->id_siswa);
        $input['total_bayar'] = $siswa->spp->nominal;
        Pembayaran::create($input);

        return redirect()->route('pembayaran.index');
        // dd($input);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }

    public function report()
    {
        $cetak = Pembayaran::orderBy('created_at','Desc')->get();
        $pdf = PDF::loadview('pembayaran.report', compact('cetak'));
        return $pdf->download('report.pdf');
    }
}
