<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use Illuminate\Http\Request;

class RundownController extends Controller
{
    public function index()
        {
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
                'namaAcara'=>'required',
                'lokasi'=>'required',
                'tanggal'=>'required',
                'waktuMulai'=>'required',
                'waktuSelesai'=>'required',
            ]);
            $input = $request->all();
            $data = Rundown::create($input);
            return redirect()->route('rundown.rundown')->with('success', 'Data Berhasil Ditambahkan');
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

            return redirect()->route('rundown.rundown')->with('success', 'Data Berhasil Diedit');
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
            // Alert::success('Success','kategori berhasil dihapus');
            return redirect()->route('rundown.rundown')->with('Success','Data berhasil dihapus');
        }
    }
