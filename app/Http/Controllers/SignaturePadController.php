<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use App\Models\Absensi;
use Illuminate\Http\Request;

class SignaturePadController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $absensi = Absensi::all();
        $rundown = Rundown::all();
        return view('absensiUser', compact('absensi','rundown'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function upload(Request $request)
    {
        $request->validate([
            'idRundowns'=>'required',
            'nama'=>'required',
            'jabatan'=>'required',
            'instansi'=>'required',
            'telp'=>'required',
            'idRundowns'=>'required',
            // 'tandatangan'=>'required'
        ]);
        $absensis = new Absensi;
        $absensis->nama = $request->get('nama');
        $absensis->jabatan = $request->get('jabatan');
        $absensis->instansi = $request->get('instansi');
        $absensis->telp = $request->get('telp');
        $absensis->idRundowns = $request->get('idRundowns');
        // $absensis->tandatangan = $request->get('tandatangan');

        $folderPath = public_path('images/');

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        return back()->with('success', 'success Full upload signature');
    }
}
