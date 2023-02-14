<?php

namespace App\Services;

use App\Models\Infant;
use App\Models\Pregnancy;
use Illuminate\Support\Facades\DB;

class PatientInfantService
{
    public function store($form)
    {
        DB::beginTransaction();
        $pregnancy = Pregnancy::findOrFail($form['pregnancy_id']);
        Infant::create($form);
        if ($pregnancy->infants()->count() == $pregnancy->baby_count) {
            $pregnancy->update([
                'is_recorded'=>true
            ]);
        }
        DB::commit();
    }
   
}
