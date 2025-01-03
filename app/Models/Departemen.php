<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    use HasFactory; 
    protected $table = 'departemens';
    protected $fillable = [
        'nama_departemen',
        'alamat',

    ];
}
