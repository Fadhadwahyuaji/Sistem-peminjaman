<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'lab_id',
        'nama_barang',
        'jenis',
        'tersedia',
        'dipinjam',
    ];
    public function Lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
