<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use App\Models\Rundown;
use App\Models\Suncar;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function index()
    {
        $rundowns = Rundown::all();
        $suncar = Suncar::all();
        return view('calender.calender', compact('rundowns','suncar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'close_date' => 'required',
        ]);
        $input = $request->all();
        Calender::create($input);
        return redirect()->route('calender.calender')->with('success', 'Data Berhasil Ditambahkan');
    }
}
