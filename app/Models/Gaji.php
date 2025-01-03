<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gajis';
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'tahun',
        'gaji_pokok',
        'potongan_id',
        'lembur_id',
        'total_gaji',
        


    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
    public function potongan()
    {
        return $this->belongsTo(Potongan::class, 'potongan_id');
    }
    public function lembur()
    {
        return $this->belongsTo(Lembur::class, 'lembur_id');
    }
}
