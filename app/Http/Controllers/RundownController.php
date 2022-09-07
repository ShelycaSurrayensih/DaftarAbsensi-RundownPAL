<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RundownController extends Controller
{
    public function index()
        {
            $num = Rundown::orderBy('idRundowns','desc')->count();
            // $dataCode = Rundown::orderBy('idRundowns','desc')->first();
            // if ($num == 0) {
            //     $code = 'PAL01';
            // }
            // else{
            //     $c = $dataCode->idRundowns;
            //     $code = substr($c, 3)+1;
            //     $code = "PAL0".$code;
            // }

            $rundown = Rundown::all();
            return view('rundown.rundown', compact('rundown'));
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
                'tahun'=>'required',
                'namaAcara'=>'required',
                'lokasi'=>'required',
                'tanggalMulai'=>'required',
                'tanggalSelesai'=>'required',
            ]);
            $input = $request->all();
            $data = Rundown::create($input);
            Alert::success('Succes','Data Rundown Berhasil Ditambahkan');
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
            Alert::success('Success','Data Rundown berhasil dihapus');
            return redirect()->route('rundown.rundown');
        }
    }
