<?php

namespace App\Http\Controllers\Midwife;

use Inertia\Inertia;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientCheckUpSchedule;

class PatientCheckUpScheduleController extends Controller
{
    public function create(Patient $patient)
    {
        return Inertia::render('Midwife/Patients/CheckUpSchedules/Create',[
            'patient'=>$patient,
        ]);
    }

    public function store(Patient $patient,StorePatientCheckUpSchedule $request)
    {
        $form = $request->validated();
    }
}
