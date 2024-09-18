<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imb extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'lokasi',
        'box',
        'text',
        'tahun',
    ];
    use HasFactory;
}
