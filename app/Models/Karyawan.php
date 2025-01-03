<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory; 
    protected $table = 'karyawans';
    protected $fillable = [
        'nama',
        'no_telpon',
        'alamat',
        'departemen_id',
        'jabatan',

    ];
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
