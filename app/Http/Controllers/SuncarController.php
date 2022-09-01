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
    public function index($id)
    {
        $suncar = Suncar::where('idRundowns', $id)->get();
        $rundown = Rundown::all();
        // return view('suncar.suncar', compact('suncar', 'rundown'));
        return view('suncar.suncar', compact('suncar', 'rundown', 'id'));
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
    public function store(Request $request, $id)
    {
        $real = new Suncar;
        $real->idSuncar = $request->idSuncar;
        $real->kodeSuncar = $request->kodeSuncar;
        $real->idRundowns = $id;
        $real->namaKegiatan = $request->namaKegiatan;
        $real->pj = $request->pj;
        $real->waktuMulai = $request->waktuMulai;
        $real->waktuSelesai = $request->waktuSelesai;
        $real->save();
        return redirect()->route('suncar.suncar', $id)->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit($idSuncar)
    {
        $suncar = Suncar::all();
        return view('suncar.edit', compact('suncar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSuncar)
    {
        $input = Suncar::where('idSuncar', $idSuncar)->update($request->except('_token'));

        return redirect()->route('suncar.suncar')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSuncar)
    {
        $input = Suncar::where('idSuncar', $idSuncar)->delete();
        // Alert::success('Success','kategori berhasil dihapus');
        return redirect()->route('suncar.suncar')->with('Success', 'Data berhasil dihapus');
    }
}
