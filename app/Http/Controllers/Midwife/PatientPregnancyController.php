<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientPregnancyRequest;
use App\Http\Requests\UpdatePatientPregnancyRequest;
use App\Models\Patient;
use App\Models\Pregnancy;
use App\Services\PatientPregnancyService;
use Inertia\Inertia;

class PatientPregnancyController extends Controller
{
    public function create(Patient $patient)
    {
        if ($patient->pregnancies()->whereActive(true)->exists()) {
            return redirect()->route('midwife.patients')->with('toast', [
                'type' => 'error',
                'message' => 'Failed to continue. Patient is currently active',
            ]);
        }

        return Inertia::render('Midwife/Patients/Pregnancy/Create', [
            'patient' => $patient,
        ]);
    }

    public function store(Patient $patient, StorePatientPregnancyRequest $request)
    {
        $form = $request->validated();
        (new PatientPregnancyService())->store($patient, $form);

        return redirect()->route('midwife.patients')->with('toast', [
            'type' => 'success',
            'message' => 'Record has been saved',
        ]);
    }

    public function edit(Patient $patient)
    {
        if (!$patient->pregnancies()->whereActive(true)->exists()) {
            return redirect()->route('midwife.patients')->with('toast', [
                'type' => 'error',
                'message' => 'Failed to continue. Patient is currently inactive',
            ]);
        }

        return Inertia::render('Midwife/Patients/Pregnancy/Edit', [
            'patient' => $patient,
            'delivery_types'=>Pregnancy::DELIVERY_TYPE
        ]);
    }

    public function update(Patient $patient,UpdatePatientPregnancyRequest $request)
    {
        (new PatientPregnancyService())->update($patient,$request->validated());

        return redirect()->route('midwife.patients')->with('toast',[
            'type'=>'success',
            'message'=>'Patient pregnancy has been updated',
        ]);
    }
}
