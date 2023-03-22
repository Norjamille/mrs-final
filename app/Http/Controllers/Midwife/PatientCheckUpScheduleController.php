<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientCheckUpSchedule;
use App\Models\Patient;
use App\Services\PatientCheckUpScheduleService;
use Inertia\Inertia;

class PatientCheckUpScheduleController extends Controller
{
    public function create(Patient $patient)
    {
        $latest_pregnancy = $patient->pregnancies()->latest()->first();
        return Inertia::render('Midwife/Patients/CheckUpSchedules/Create', [
            'patient' => $patient->load(['checkUps'=>function($query) use($latest_pregnancy){
                $query->where('pregnancy_id',$latest_pregnancy->id);
            }]),
        ]);
    }

    public function store(Patient $patient, StorePatientCheckUpSchedule $request)
    {
        $form = $request->validated();
        (new PatientCheckUpScheduleService())->store($patient, $form);

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Schedule has been set',
        ]);
    }
}
