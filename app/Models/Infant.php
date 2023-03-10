<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pregnancy()
    {
        return $this->belongsTo(Pregnancy::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
