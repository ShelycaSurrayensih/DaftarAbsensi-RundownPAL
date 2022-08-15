<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use App\Models\Suncar;
use Illuminate\Http\Request;

class SuncarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suncar = Suncar::all();
        return view('suncar.suncar', compact('suncar'));
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
        $request->validate([
            'kodeSuncar'=>'required',
            'idRundowns'=>'required',
            'namaKegiatan'=>'required',
            'pj'=>'required',
            'waktuMulai'=>'required',
            'waktuSelesai'=>'required',
        ]);
        $input = $request->all();
        $s = Suncar::create($input);
        return redirect()->route('suncar.suncar')->with('success', 'Data Berhasil Ditambahkan');
        $r = Rundown::find($request->get('idRundown'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
