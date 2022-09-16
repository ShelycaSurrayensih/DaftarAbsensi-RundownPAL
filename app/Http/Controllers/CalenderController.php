<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use App\Models\Rundown;
use App\Models\Suncar;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function index()
    {
        $visitor_lists = Absensi::orderBy('created_at', 'DESC')->get();
        $data = Absensi::latest()->paginate(10);

        $datetime = Carbon::now();
        $current_date = Absensi::whereDate('created_at', Carbon::today())->get(['nama', 'created_at']);
        $current_week = Absensi::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $current_month = Absensi::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['nama', 'created_at']);
        $rundown = Rundown::all();
        $suncar = Suncar::all();
        return view('calender.calender', compact('suncar','rundown','visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'datetime'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
