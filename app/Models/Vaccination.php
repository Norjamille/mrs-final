<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $guarded = [];

    const VACCINES = [
        'bcg'=>"BCG",
        'hepatitis_b' => 'HEPATITIS B',
        'pentavalent_vaccine'=>'PENTAVALENT VACCINE (DPT-Hep B-HIB)',
        'oral_polio_vaccine'=>'ORAL POLIO VACCINE (OPV)',
        'inactive_polio'=>'INACTIVE POLIO VACCINE (IPV)',
        'pnuemococal_conjugate_vaccine'=>'MEASLES, MUMPS, RUBELLA (MMR)',
    ];

    const MONTHS = [
        1 =>'At Birth',
        2 => '1 1/2 Months',
        3 => '2 1/2 Months',
        4 => '3 1/2 Months',
        5 => '9 1/2 Months',
        6 => '1 Year',
    ];

    public function infant()
    {
        return $this->belongsTo(Infant::class);
    }

}
