<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;
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
        return view('index.index', compact('visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'datetime'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        return view('index.index', ['user'=>$user]);
    }
}
