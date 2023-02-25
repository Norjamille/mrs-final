<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\CheckUp;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Patient/Dashboard',[
            'check_ups'=>CheckUp::query()
                        ->where('patient_id',auth()->user()->patient->id)
                        ->orderBy('date_at','desc')
                        ->get()
                        ->append('formated_date_at'),
        ]);
    }
}
