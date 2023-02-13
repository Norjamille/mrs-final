<?php

namespace App\Http\Controllers\Midwife;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\CheckUp;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCheckUpRequest;
use App\Services\PatientCheckUpScheduleService;
use Illuminate\Support\Facades\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return Inertia::render('Midwife/Schedules/Index', [
            'schedules' => CheckUp::query()
                            ->with('patient')
                            ->paginate(10)
                            ->withQueryString()
                            ->through(fn ($check_up) => [
                                'id' => $check_up->id,
                                'patient_name' => $check_up->patient->full_name,
                                'date'=>Carbon::parse($check_up->date_at)->format('M d Y | H:m A'),
                                'is_done'=>$check_up->done_at ? true : false,
                            ]),
                'filters'=>Request::only(['search','status','date'])
        ]);
    }

    public function edit(CheckUp $checkup)
    {
        return Inertia::render('Midwife/Schedules/Edit',[
            'checkUp'=>$checkup,
        ]);
    }

    public function update(CheckUp $checkup,UpdateCheckUpRequest $request)
    {
        (new PatientCheckUpScheduleService())->update($checkup,$request->validated());

        return redirect()->route('midwife.schedules')->with('toast',[
            'type'=>'success',
            'message'=>'Record has been saved',
        ]);
    }
}
