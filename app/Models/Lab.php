<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $fillable = [
        'lab',
    ];
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
