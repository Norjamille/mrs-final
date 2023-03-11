<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PatientPregnancyService
{
    public function store($patient, $form)
    {
        DB::beginTransaction();
        $patient->pregnancies()->create($form);
        $this->createAutoSchedule($patient);
        DB::commit();
    }

    public function update($patient, $form)
    {
        $pregnancy = $patient->pregnancies()->whereActive(true)->first();
        DB::beginTransaction();
        $pregnancy->update($form);
        DB::commit();
    }


    public function createAutoSchedule($patient)
    {
            $current_age_of_gestation = $patient->pregnancies()->first()->age_of_gestation;
            $remaining_check_up = 9 - $current_age_of_gestation;
            $current_date = now();

            for ($i = 1; $i <= $remaining_check_up; $i++) {
                $current_date = $current_date->addWeeks(4);
                $patient->checkups()->create([
                    'date_at' => $current_date,
                    'description' => 'Check Up No. ' . $i,
                ]);
            }
    }
}
