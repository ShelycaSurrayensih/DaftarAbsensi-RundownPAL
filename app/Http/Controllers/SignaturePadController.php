<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use App\Models\Absensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SignaturePadController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index($id)
    {
        $absensi = Absensi::all();
        $rundown = Rundown::all();
        $rundownDetail = Rundown::where('idRundowns', $id)->first();
        return view('absensiUser', compact('absensi','rundown', 'rundownDetail'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function upload(Request $request)
    {
        //$input = $request->all();
        $id = $request->idRundowns;
        //$data = Absensi::create($input);
        $data = new Absensi;
        $data->idRundowns = $request->idRundowns;
        $data->tanggal = $request->get('tanggal');
        $data->nama = $request->get('nama');
        $data->jabatan = $request->get('jabatan');
        $data->instansi = $request->get('instansi');
        $data->telp = $request->get('telp');

        //$folderPath = public_path('images/');

        $image_parts = explode(";base64,", $request->tandatangan);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $image_name = uniqid() . '.'.$image_type;
        $file = 'storage/images/' . $image_name;
        $data->tandatangan = 'images/' . $image_name;
        //$file = $folderPath . uniqid() . '.'.$image_type;
        // $data->tandatangan = $

        file_put_contents($file, $image_base64);
        $data->save();
        //dd($file);
        Alert::success('Succes','Data Absensi Berhasil Ditambahkan');
        return redirect()->route('absensi.absensi', $id);

    }
}

