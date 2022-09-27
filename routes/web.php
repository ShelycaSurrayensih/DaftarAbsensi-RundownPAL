<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\RundownController;
use App\Http\Controllers\SuncarController;
use App\Http\Controllers\SignaturePadController;
use App\Http\Controllers\UserabsensiController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\QrCodeGeneratorController;
use App\Http\Controllers\PengunjungController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/house', [App\Http\Controllers\HouseController::class, 'index'])->name('house');

Route::get('/pengunjung/{id}', [PengunjungController::class, 'index'])->name('pengunjung.pengunjung');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index.index');
    Route::get('/dataabsensi/{id}', [AbsensiController::class, 'index'])->name('absensi.absensi');
    Route::post('/dataabsensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::delete('/dataabsensi/{idAbsensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
    Route::put('/dataabsensi/{idAbsensi}', [AbsensiController::class, 'update'])->name('Absensi.update');
    Route::get('/absensi/pdf/{id}', [AbsensiController::class, 'pdf'])->name('absensi.pdf');
    Route::get('/admin/user/', [UserController::class, 'index'])->name('admin.user');
    Route::post('/admin/user/', [UserController::class, 'store'])->name('user.store');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/calender', [CalenderController::class, 'index'])->name('calender.calender');
    Route::post('/calender', [CalenderController::class, 'store'])->name('calender.store');
    Route::get('/rundown', [RundownController::class, 'index'])->name('rundown.rundown');
    Route::post('/rundown', [RundownController::class, 'store'])->name('rundown.store');
    Route::delete('/rundown/{id}', [RundownController::class, 'destroy'])->name('rundown.destroy');
    Route::post('/rundown/{id}', [RundownController::class, 'update'])->name('rundown.update');
    Route::post('/suncar', [SuncarController::class, 'store'])->name('suncar.store');
    Route::delete('/suncar/{id}', [SuncarController::class, 'destroy'])->name('suncar.destroy');
    Route::put('/suncar/{id}', [SuncarController::class, 'update'])->name('suncar.update');
    Route::get('/suncar/{id}', [SuncarController::class, 'index'])->name('suncar.suncar');
    Route::get('/suncar/pdf/{id}', [SuncarController::class, 'pdf'])->name('suncar.pdf');
    Route::get('/absensi/{id}', [SignaturePadController::class, 'index'])->name('absensi.signature');
    Route::post('/absensi', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');
    Route::get('/qr-code', [QrCodeGeneratorController::class, 'index']);
    // Route::get('/absensi', [UserabsensiController::class, 'index'])->name('absensiUser');
    // Route::post('/absensi', [UserabsensiController::class, 'store'])->name('userabsensi.store');
});
