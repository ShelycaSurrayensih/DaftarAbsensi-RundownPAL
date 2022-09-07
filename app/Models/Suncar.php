<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rundown;

class Suncar extends Model
{
    use HasFactory;
    protected $table="suncar"; // Eloquent akan membuat model Barang menyimpan record di tabel barang
    protected $primaryKey = 'idSuncar'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable. *
     * @var array
     */
    protected $fillable = [
        'namaKegiatan',
        'pj',
        'waktuMulai',
        'waktuSelesai',
        'idRundowns',
    ];

    public function rundown()
    {
        return $this->belongsTo(Rundown::class, 'idRundowns');
    }
}
