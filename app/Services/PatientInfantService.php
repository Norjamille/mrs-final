<?php

namespace App\Services;

use App\Models\Infant;
use App\Models\Pregnancy;
use Illuminate\Support\Facades\DB;

class PatientInfantService
{
    public function store($form)
    {
        $createMore = true;
        DB::beginTransaction();
        $pregnancy = Pregnancy::findOrFail($form['pregnancy_id']);
        Infant::create($form);
        if ($pregnancy->infants()->count() == $pregnancy->baby_count) {
            $pregnancy->update([
                'is_recorded' => true,
            ]);
            $createMore = false;
        }
        DB::commit();

        return $createMore;
    }

    public function update($infant, $form)
    {
        DB::beginTransaction();
        $infant->update($form);
        DB::commit();
    }
}
