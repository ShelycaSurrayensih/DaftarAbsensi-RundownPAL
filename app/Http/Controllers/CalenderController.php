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

    public function create()
    {
        return view('calender.create');
    }

    public function store(Request $request)
    {
        Calender::create($request->all());
        return redirect()->route('calender.calender');
    }
}
