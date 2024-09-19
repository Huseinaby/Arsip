<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imb extends Model
{
    protected $fillable = [
        'nomor_dp',
        'nama',
        'alamat',
        'lokasi',
        'box',
        'keterangan',
        'tahun',
        'imbs',
    ];
    use HasFactory;
}
