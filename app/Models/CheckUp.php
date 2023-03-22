<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUp extends Model
{
    use HasFactory;

    protected $guarded = [];

    const BLOOD_TYPES = [
        'A' => 'A',
        'B' => 'B',
        'AB' => 'AB',
        'O' => 'O',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getFormatedDateAtAttribute()
    {
        return Carbon::parse($this->date_at)->format('F d, Y h:i A');
    }
}
