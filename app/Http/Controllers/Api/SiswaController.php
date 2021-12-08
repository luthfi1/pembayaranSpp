<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SiswaResource;
use App\Siswa;
use Validator;
use Illumiate\Support\Arr;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            return redirect()->json([
"status" => FALSE,
"msg" => $validator->errors()
            ],400);   
    }
if(Siswa::create($input))
{
return response()->json([
    'status' => TRUE,
    'msg' => 'Siswa berhasil dibuat'
],201);
}else
{
    return  reponse()->json([
        'status'=>FALSE,
        'msg' => 'Siswa gagal ditambahkan'
    ]);
  }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        if(is_null($siswa)){
            return response()->json([
                "status"=>FALSE,
                "msg" => 'Data siswa tidak ada'
            ],404);
        }
        return new SiswaResource($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $siswa = Siswa::find($id);
        if(is_null($input))
        {
            return response()->json([
            'status'=>FALSE,
             'msg'=>'Siswa tidak ditemukan'
            ],404);
        }
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
            return reponse()->json([
                'status'=>FALSE,
                'msg'=> $validator->errors()
            ],400);
        }
        $siswa->update($input);
        return reponse()->json([
            'status'=>TRUE,
            'msg'=> 'Data berhasi diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if(is_null($siswa))
        {
            return reponse()->json([
                'status'=>FALSE,
                'msg'=>'Siswa tidak ditemukan',
            ],404);
        }
        $siswa->delete();
        return reponse()->json([
            'status'=>TRUE,
            'msg'=> 'Data berhasil dihapus'
        ],200);
    }

    public function login_siswa(Request $request)
    {
$input = $request->all();
$validator = validator::make($input,[
'nis' => 'required',
'nama' => 'required',
]);
if($validator->faills())
{
    return reponse()->json([
'status' => FALSE,
'msg' =>$validator->errors()
    ],400);
}
$nis = $request->input('nis');
$nama = $request->input('nama');

$siswa = Siswa::where([
    ['nis', $nis],
])->first();

if(is_null($siswa))
{
    return reponse()->json([
'status'=>FALSE,
'msg'=>'nis tidak ditemukan',
'siswa'=>new SiswaResource($siswa)
    ],200);  
}else{
    if(strtolower($nama) == strtolower($request->nama))
{
    return reponse()->json([
'status'=>TRUE,
'msg'=>'Username ditemukan',
'siswa'=>new SiswaResource($siswa)
    ],200);
    return reponse()->json([
      'status'=>FALSE,
        'msg'=>'nis & nama Tidak Sesuai',
    ],200);
   }
  }
 }
}