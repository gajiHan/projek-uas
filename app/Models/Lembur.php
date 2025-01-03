<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lemburs';
    protected $fillable = [
        'karyawan_id',
        'tanggal_lembur',
        'jumlah_jam_lembur',
        'upah_lembur_perjam',
        'total_lembur',
        'keterangan',

    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
