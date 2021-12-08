<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Spp;
use App\Kelas;
use App\Pembayaran;
use Illuminate\Http\Request;
use Validator;

class SiswaController extends Controller
{
    public function index(request $request)
    {
        $siswa = Siswa::paginate(5);
        $spp = Spp::all();
        $kelas = Kelas::all();
        $cari = $request->get('keyword');
        if($cari)
        {
            $siswa = Siswa::where('nama','LIKE',"%$cari%")->paginate(5);
        }
        return view('siswa.index', compact('siswa','spp','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spp = Spp::all();
        $kelas = kelas::all();
        return view('siswa.create', compact('spp','kelas'));
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
        $validator = Validator::make($input,[
            'id_kelas' => 'required',
            'id_spp' => 'required',
            'nisn' => 'required|max:12',
            'nis' => 'required|max:12',
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|max:15'
        ]);
        if($validator->fails())
        {
            return redirect()->route('siswa.create')->withErrors($validator)->withInput();
        }
        Siswa::create($input);
        return redirect()->route('siswa.index')->with('success','Berhasil');
        // dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        $pembayaran = Pembayaran::where('id_siswa', $id)->get()->all();
        return view('siswa.show', compact('siswa','kelas','spp','pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $spp = Spp::all();
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa','spp','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $spp = Spp::all();
        $kelas = Kelas::all();
        $data = $request->all();
        $siswa->update($data);
        return redirect()->route('siswa.index')->with('success','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::findOrFail($id);
        $data->delete();
        return redirect()->route('siswa.index');
    }
}
