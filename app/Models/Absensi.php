<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'instansi',
        'telp',
        'tandatangan'
    ];
    public static function index()
    {
        return Absensi::all();
    }
}
