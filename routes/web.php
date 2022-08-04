<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;

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
Route::get('/', [HomeController::class, 'index'])->name('index.index');
Route::get('/dataabsensi', [AbsensiController::class, 'index'])->name('absensi.absensi');
Route::post('/dataabsensi', [AbsensiController::class, 'store'])->name('absensi.store');
Route::delete('/dataabsensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
Route::put('/dataabsensi/{id}', [AbsensiController::class, 'update'])->name('Absensi.update');
Route::get('/admin/user/', [UserController::class, 'index'])->name('admin.user');
Route::post('/admin/user/', [UserController::class, 'store'])->name('user.store');
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
