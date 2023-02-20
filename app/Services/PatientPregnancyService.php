<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PatientPregnancyService
{
    public function store($patient, $form)
    {
        DB::beginTransaction();
        $patient->pregnancies()->create($form);
        DB::commit();
    }

    public function update($patient, $form)
    {
        $pregnancy = $patient->pregnancies()->whereActive(true)->first();
        DB::beginTransaction();
        $pregnancy->update($form);
        DB::commit();
    }
}
