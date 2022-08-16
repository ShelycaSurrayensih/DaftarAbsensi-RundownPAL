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
        $rundown = Rundown::all();
        return view('suncar.suncar', compact('suncar', 'rundown'));
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
            'idSuncar'=>'required',
            'idRundowns'=>'required',
            'acara'=>'required',
            'pj'=>'required',
            'waktuMulai'=>'required',
            'waktuSelesai'=>'required',
        ]);
        $input = $request->all();
        $s = Suncar::create($input);
        return redirect()->route('suncar.suncar')->with('success', 'Data Berhasil Ditambahkan');
        $r = Rundown::find($request->get('idRundowns'));
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
        return redirect()->route('suncar.suncar')->with('Success','Data berhasil dihapus');
    }
}
