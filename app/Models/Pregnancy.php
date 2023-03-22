<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregnancy extends Model
{
    use HasFactory;

    protected $guarded = [];

    const DELIVERY_TYPE = [
        'natural_birth' => 'Natural Birth',
        'scheduled_cesarean' => 'Scheduled Cesarean',
        'unplanned_cesarean' => 'Uplanned Cesarean',
        'vbca' => 'Vaginal Birth after C-Section',
        'scheduled_induction' => 'Scheduled Induction',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function infants()
    {
        return $this->hasMany(Infant::class);
    }
}
