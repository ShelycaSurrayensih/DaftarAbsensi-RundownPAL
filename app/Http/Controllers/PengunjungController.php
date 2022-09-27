<?php

namespace App\Http\Controllers;
use App\Models\Rundown;
use App\Models\Suncar;
use Illuminate\Http\Request;
use PDF;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Suncar::latest()->paginate(10);
        $suncar = Suncar::orderBy('tanggal')->orderBy('waktuMulai')->get();
        $rundownDetail = Rundown::where('idRundowns', $id)->first();
        $rundown = Rundown::all();
        return view('pengunjung.pengunjung', compact('suncar','id', 'rundownDetail','rundown','data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
        //
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
    //-- PDF Detail --//
    public function pdf($id)
    {
        $suncar = Suncar::orderBy('tanggal')->orderBy('waktuMulai')->get();
        $suncarKonten = Suncar::where('idRundowns', $id)->groupBy('tanggal')->get();
        $suncarFirst = Suncar::groupBy('tanggal')->first();
        $rundown = Rundown::all();
        $pdf = PDF::loadview('index.pdf', compact('suncar', 'rundownDetail', 'rundown', 'suncarKonten', 'suncarFirst'));
        return $pdf->stream();
    }
}
