<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        $datauser = User::all();
        return view('admin.user', compact('datauser','visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'datetime'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $datauser = new User;
        $datauser->name = $request->get('name');
        $datauser->email = $request->get('email');
        $datauser->password = Hash::make($request->get('password'));
        $datauser->save();
        Alert::success('Succes','Data User Berhasil Ditambahkan');
        return redirect()->route('admin.user');
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
    public function edit(User $users)
    {
        $users = User::all();
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        Alert::success('Success', 'Data User Berhasil Diupdate');
        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success('Success','Data User berhasil dihapus');
        return redirect()->route('admin.user')->with('success','Data berhasil Dihapus');
    }
}
