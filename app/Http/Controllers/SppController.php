<?php

namespace App\Http\Controllers;

use App\Spp;
use Illuminate\Http\Request;
use Validator;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spp = Spp::paginate(5);
        return view('spp.index',compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
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
        $validator = Validator($input,[
            'tahun' => 'required|max:4',
            'nominal' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect('spp.create')->withErrors('$validator')->withInput();
        }
        Spp::create($input);
        return redirect()->route('spp.index')->with('success','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $spp = Spp::findOrFail($id);
        $data = $request->all();
        $spp->update($data);
        return redirect()->route('spp.index')->with('success','Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Spp::findOrFail($id);
        $data->delete();
        return redirect()->route('spp.index');
    }
}
