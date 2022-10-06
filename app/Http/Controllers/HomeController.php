<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Rundown;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        $user = Auth::user();
        $record = Absensi::select(DB::raw("COUNT(*) as total"), DB::raw("DATE(created_at) as day_name"))
                    ->whereMonth('created_at', date('m'))
                    ->groupBy(DB::raw('Date(created_at)'))
                    ->get();
                    //->pluck('total', 'day_name');

        $labels = $record->pluck('day_name');
        $datacharts = $record->pluck('total');
        return view('index.index', compact('visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'datetime', 'record', 'labels', 'datacharts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        return view('index.index', ['user'=>$user]);
    }
}
