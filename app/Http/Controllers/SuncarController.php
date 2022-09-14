<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use App\Models\Suncar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

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
        $rundownDetail = Rundown::where('idRundowns', $id)->first();
        return view('suncar.suncar', compact('suncar', 'rundown', 'id', 'rundownDetail'));
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
        $real = new Suncar;
        $real->idSuncar = $request->idSuncar;
        $real->idRundowns = $request->idRundowns;
        $real->namaKegiatan = $request->namaKegiatan;
        $real->pj = $request->pj;
        $real->waktuMulai = $request->waktuMulai;
        $real->waktuSelesai = $request->waktuSelesai;
        $real->save();
        Alert::success('Succes','Data Suncar Berhasil Ditambahkan');
        return redirect()->back();
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
        $input = Suncar::where('idSuncar', $idSuncar)->update($request->except('_method', '_token'));
        Alert::success('Success', 'Data Suncar Berhasil Diupdate');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSuncar)
    {
        Suncar::where('idSuncar', $idSuncar)->delete();
        Alert::success('Success','Data Suncar berhasil dihapus');
        return redirect()->back();
    }

    //-- PDF Detail --//
    public function pdf($id)
    {
        $suncar = Suncar::all();
        $rundownDetail = Rundown::where('idRundowns', $id)->first();
        $rundown = Rundown::all();
        $pdf = PDF::loadview('index.pdf', compact('suncar', 'rundownDetail', 'rundown'));
        return $pdf->stream();
    }
}
