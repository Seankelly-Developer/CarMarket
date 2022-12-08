<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
    public function colours()
    {
        return $this->belongstoMany(Colour::class)->withTimestamps();
    }
}
