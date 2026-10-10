<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'perusahaan',
        'varietas',
        'stok',
        'harga',
        'lokasi',
        'minimal_order',
        'img',
    ];
}
