<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PatientPregnancyService
{
    public function store($patient,$form)
    {
        DB::beginTransaction();
        $patient->pregnancies()->create($form);
        DB::commit();
    }
}
