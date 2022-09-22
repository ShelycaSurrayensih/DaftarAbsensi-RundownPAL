<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rundown;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';
    protected $primarykey = 'idAbsensi';
    protected $fillable = [
        'tanggal',
        'nama',
        'jabatan',
        'instansi',
        'telp',
        'tandatangan',
        'idRundowns'
    ];
    // public static function index()
    // {
    //     return Absensi::all();
    // }
    public function rundown(){
        return $this->belongsTo('App\Models\Rundown');
    }
}
