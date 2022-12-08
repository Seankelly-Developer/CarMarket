<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use HasFactory;
    public function cars()
    {
        return $this->belongstoMany(car::class)->withTimestamps();
    }
}
