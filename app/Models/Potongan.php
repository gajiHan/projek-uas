<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;
    protected $table = 'potongans';
    protected $fillable = [
        'karyawan_id',
        'jenis_potongan',
        'jumlah_potongan',
        

    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
