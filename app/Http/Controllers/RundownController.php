<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RundownController extends Controller
{
    public function index()
    {
        $visitor_lists = Absensi::orderBy('created_at', 'DESC')->get();
        $data = Absensi::latest()->paginate(10);

        $datetime = Carbon::now();
        $current_date = Absensi::whereDate('created_at', Carbon::today())->get(['nama', 'created_at']);
        $current_week = Absensi::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $current_month = Absensi::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['nama', 'created_at']);
        $rundown = Rundown::all();
        return view('rundown.rundown', compact('rundown','visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'datetime'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'tahun' => 'required',
            'namaAcara' => 'required',
            'lokasi' => 'required',
            'tanggalMulai' => 'required',
            'tanggalSelesai' => 'required',
        ]);
        $input = $request->all();
        $data = Rundown::create($input);
        Alert::success('Succes', 'Data Rundown Berhasil Ditambahkan');
        return redirect()->route('rundown.rundown');
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
    public function edit($idRundowns)
    {
        $rundown = Rundown::all();
        return view('rundown.edit', compact('rundown'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idRundowns)
    {
        $input = Rundown::where('idRundowns', $idRundowns)->update($request->except('_token'));
        Alert::success('Success', 'Data Rundown Berhasil Diupdate');
        return redirect()->route('rundown.rundown');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRundowns)
    {
        $input = Rundown::where('idRundowns', $idRundowns)->delete();
        Alert::success('Success', 'Data Rundown berhasil dihapus');
        return redirect()->route('rundown.rundown');
    }
}
