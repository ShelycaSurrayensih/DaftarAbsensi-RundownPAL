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
        $input = $request->all();
        $data = Absensi::create($input);

        $folderPath = public_path('images/');

        $image_parts = explode(";base64,", $request->tandatangan);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        Alert::success('Succes','Data Rundown Berhasil Ditambahkan');
        return redirect()->route('absensi.absensi');

    }
}

