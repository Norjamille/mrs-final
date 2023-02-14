<?php

namespace App\Http\Controllers\Midwife;

use Inertia\Inertia;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientInfantRequest;
use App\Services\PatientInfantService;

class PatientInfantController extends Controller
{
    public function create(Patient $patient)
    {
        return Inertia::render('Midwife/Patients/Infants/Create',[
            'patient'=>$patient,
            'pregnancy'=>$patient->pregnancies()->whereIsRecorded(false)->first()
        ]);
    }

    public function store(Patient $patient,StorePatientInfantRequest $request)
    {   
        (new PatientInfantService())->store($request->validated());
        return redirect()->route('midwife.patients')->with('toast',[
            'type'=>'success',
            'message'=>'Record has been saved',
        ]);
    }

}
