<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slip extends Model
{
    use HasFactory;
    protected $table = 'slips';
    protected $fillable = [
        'karyawan_id',
        'departemen_id',
        'gaji_id',
        'tunjangan_id',
        'total_pendapatan',



    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
    public function departemen()
    {
        return $this->belongsTo(Potongan::class, 'departemen_id');
    }
    public function gaji()
    {
        return $this->belongsTo(Lembur::class, 'gaji_id');
    }
    public function tunjangan()
    {
        return $this->belongsTo(Lembur::class, 'tunjangan_id');
    }
}
