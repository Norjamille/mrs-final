<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PatientCheckUpScheduleService
{
    public function store($patient, $form)
    {
        DB::beginTransaction();
        $patient->checkUps()->create($form);
        DB::commit();
    }

    public function update($checkup, $form)
    {
        DB::beginTransaction();
        $checkup->update($form);
        DB::commit();
    }
}
