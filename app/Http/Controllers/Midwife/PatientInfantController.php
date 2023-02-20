<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientInfantRequest;
use App\Http\Requests\UpdatePatientInfantRequest;
use App\Models\Infant;
use App\Models\Patient;
use App\Services\PatientInfantService;
use Inertia\Inertia;

class PatientInfantController extends Controller
{
    public function create(Patient $patient)
    {
        return Inertia::render('Midwife/Patients/Infants/Create', [
            'patient' => $patient,
            'pregnancy' => $patient->pregnancies()->whereIsRecorded(false)->first(),
        ]);
    }

    public function store(Patient $patient, StorePatientInfantRequest $request)
    {
        $createMore = (new PatientInfantService())->store($request->validated());

        if ($createMore) {
            return redirect()->route('midwife.patients.infant.create', [$patient])->with('toast', [
                'type' => 'success',
                'message' => 'Record has been saved',
            ]);
        }

        return redirect()->route('midwife.patients')->with('toast', [
            'type' => 'success',
            'message' => 'Record has been saved',
        ]);
    }

    public function edit(Infant $infant)
    {
        return Inertia::render('Midwife/Patients/Infants/Edit', [
            'infant' => $infant,
        ]);
    }

    public function update(Infant $infant, UpdatePatientInfantRequest $request)
    {
        (new PatientInfantService())->update($infant, $request->validated());

        return redirect()->route('midwife.infants')->with('toast', [
            'type' => 'success',
            'message' => 'Infant updated successfully',
        ]);
    }
}
