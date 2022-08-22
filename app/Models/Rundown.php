<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suncar;
use App\Models\Absensi;

class Rundown extends Model
{
    use HasFactory;
    protected $table = 'rundowns';
    protected $primarykey = 'idRundowns';
    protected $fillable = [
        'idRundowns',
        'namaAcara',
        'kodeRundowns',
        'lokasi',
        'tanggal',
        'waktuMulai',
        'waktuSelesai',
    ];
    public function suncar()
    {
        return $this->hasMany(Suncar::class);
    }
    public function absensi(){
        return $this->belongsTo('App\Models\Absensi');
    }
}
