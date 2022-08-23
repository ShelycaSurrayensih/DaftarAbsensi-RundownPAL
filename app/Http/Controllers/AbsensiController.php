<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Rundown;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::all();
        $rundown = Rundown::all();
        return view('absensi.absensi', compact('absensi','rundown'));
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
            'idRundowns'=>'required',
            'nama'=>'required',
            'jabatan'=>'required',
            'instansi'=>'required',
            'telp'=>'required',
            'idRundowns'=>'required',
            'tandatangan'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('tandatangan')) {
            // $request->file('tandatangan')->move('images/', $request->file('tandatangan')->getClientOriginalName());
            // $data->tandatangan = $request->file('tandatangan')->getClientOriginalName();
            // $data->tandatangan = $image_name;
            // $data->save();
            $image_name = $request->file('tandatangan')->store('images', 'public');
        }
        // $input = $request->all();
        // $data = Absensi::create($input);

        // $rundown = Rundown::where($request->get('idRundowns'));

        $absensis = new Absensi;
        $absensis->nama = $request->get('nama');
        $absensis->jabatan = $request->get('jabatan');
        $absensis->instansi = $request->get('instansi');
        $absensis->telp = $request->get('telp');
        $absensis->idRundowns = $request->get('idRundowns');
        $absensis->tandatangan = $image_name;
        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        // $absensis->rundown()->associate($input);
        $absensis->save();
        return redirect()->route('absensi.absensi')->with('success', 'Data Berhasil Ditambahkan');
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
        $absensis = Absensi::all();
        return view('absensi.edit', compact('absensis'));
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
        Absensi::find($id)->update([
            'Nama'=>$request->nama,
            'Jabatan'=>$request->jabatan,
            'Instansi'=>$request->instansi,
            'No Hp'=>$request->telp,
            // 'gambar'=>$request->gambar,
        ]);
        $input = $request->all();
        if ($image = $request->file('tandatangan')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['tandatangan'] = "$profileImage";
        } else {
            unset($input['tandatangan']);
        }
        Absensi::find($id)->update($input);
        return redirect()->route('absensi.absensi')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tandatangan = Absensi::find($id);
        unlink("images/".$tandatangan->tandatangan);
        Absensi::find($id)->delete();
        // Alert::success('Success','kategori berhasil dihapus');
        return redirect()->route('absensi.absensi')->with('Success','Data berhasil dihapus');
    }
}
