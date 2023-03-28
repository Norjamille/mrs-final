<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class PatientController extends Controller
{
    public function index()
    {
        $search = Request::input('search');
        $status = Request::input('status');
        $created = Request::input('created');

        return Inertia::render('Admin/Patients/Index', [
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
}
