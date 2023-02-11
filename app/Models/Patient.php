<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getIsPregnantAttribute()
    {
        return $this->current_pregnant_with ? true:false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pregnancies()
    {
        return $this->hasMany(Pregnancy::class);
    }
}
