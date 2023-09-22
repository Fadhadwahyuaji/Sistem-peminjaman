<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lab_id',
        'jabatan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lab()
    {
        return $this->belongsTo(Lab::class,'lab_id');
    }
}
