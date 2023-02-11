<?php

namespace App\Http\Controllers\Midwife;

use Inertia\Inertia;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientPregnancyRequest;
use App\Services\PatientPregnancyService;

class PatientPregnancyController extends Controller
{
    public function create(Patient $patient)
    {
        if ($patient->pregnancies()->whereActive(true)->exists()) {
            return redirect()->route('midwife.patients')->with('toast',[
                'type'=>'error',
                'message'=>'Failed to continue. Patient is currently active'
            ]);
        }
        return Inertia::render('Midwife/Patients/Pregnancy/Create',[
            'patient'=>$patient,
        ]);
    }

    public function store(Patient $patient,StorePatientPregnancyRequest $request)
    {
        $form = $request->validated();
        (new PatientPregnancyService())->store($patient,$form);
        return redirect()->route('midwife.patients')->with('toast',[
            'type'=>'success',
            'message'=>'Record has been saved',
        ]);
    }
}
