<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function index()
    {
        $calender = Calender::all();
        return view('calender.calender', compact('calender'));
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
