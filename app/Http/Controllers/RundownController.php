<?php

namespace App\Http\Controllers;

use App\Models\Rundown;
use Illuminate\Http\Request;

class RundownController extends Controller
{
    public function index()
    {
        $calender = Rundown::all();
        return view('calender.calender', compact('calender'));
    }

    public function create()
    {
        return view('rundowns.create');
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
        Rundown::create($input);
        return redirect()->route('calender.calender')->with('success', 'Data Berhasil Ditambahkan');
    }
}
