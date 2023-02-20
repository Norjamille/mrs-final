<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\Purok;
use App\Services\PatientService;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    public function index()
    {
        $search = Request::input('search');
        $status = Request::input('status');
        $created = Request::input('created');

        return Inertia::render('Midwife/Patients/Index', [
            'patients' => Patient::query()
                        ->when($search, function ($query) use ($search) {
                            $query->where('last_name', 'like', "%{$search}%")
                                    ->orWhere('first_name', 'like', "%{$search}%");
                        })
                        ->when($status, function ($query) {
                            $query->whereHas('pregnancies', function ($query) {
                                $query->whereActive(true);
                            });
                        })
                        ->when($created, function ($query) use ($created) {
                            $query->orderBy('created_at', $created);
                        })
                        ->with(['pregnancies'])
                        ->paginate(10)
                        ->withQueryString()
                        ->through(fn ($patient) => [
                            'id' => $patient->id,
                            'full_name' => $patient->full_name,
                            'age' => $patient->age,
                            'address' => $patient->address,
                            'contact_number' => $patient->contact_number,
                            'is_pregnant' => count($patient->pregnancies->where('active', true)),
                            'has_unrecorded_baby' => count($patient->pregnancies->where('active', false)->where('is_recorded', false)),
                        ]),
            'filters' => Request::only(['search', 'status', 'created']),
        ]);
    }

    public function create()
    {
        $puroks = Purok::all();

        return Inertia::render('Midwife/Patients/Create', [
            'puroks' => $puroks,
        ]);
    }

    public function store(StorePatientRequest $request)
    {
        (new PatientService())->store($request->validated());

        return redirect()->route('midwife.patients')->with('toast', [
            'type' => 'success',
            'message' => 'Patient has been created',
        ]);
    }

    public function edit(Patient $patient)
    {
        $puroks = Purok::all();

        return Inertia::render('Midwife/Patients/Edit', [
            'puroks' => $puroks,
            'patient' => $patient,
        ]);
    }

    public function update(Patient $patient, UpdatePatientRequest $request)
    {
        (new PatientService())->update($patient, $request->validated());

        return redirect()->route('midwife.patients')->with('toast', [
            'type' => 'success',
            'message' => 'Patient has been updated',
        ]);
    }

    public function destroy(Patient $patient)
    {
        (new PatientService())->destroy($patient);

        return redirect()->route('midwife.patients')->with('toast', [
            'type' => 'success',
            'message' => "Patient's record has been deleted successfully",
        ]);
    }
}
