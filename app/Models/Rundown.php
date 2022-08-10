<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rundown extends Model
{
    use HasFactory;
    protected $table = 'rundowns';
    protected $primarykey = 'idRundowns';
    protected $fillable = [
        'namaAcara',
        'lokasi',
        'lokasi',
        'waktuMulai',
        'waktuSelesai',
    ];
    // public static function index(){
    //     return Rundown::all();
    // }
}
