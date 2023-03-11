<?php

namespace App\Http\Controllers\Midwife;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Purok;
use App\Models\Infant;
use App\Models\CheckUp;
use App\Models\Pregnancy;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Support\Facades\Request;

class ReportController extends Controller
{
    public function index()
    {
        return Inertia::render('Midwife/Reports/Index');
    }

    public function perPurok()
    {
        // get all puroks with count of patients where has pregnancy where active is true
        $puroks = Purok::withCount(['patients' => function ($query) {
            $query->whereHas('pregnancies', function ($query) {
                $query->where('active', true);
            });
        }])->get();
        return Inertia::render('Midwife/Reports/PerPurok',[
            'puroks'=>$puroks,
        ]);
    }

    public function perGender()
    {
        $male = Infant::where('gender','Male')->count();
        $female = Infant::where('gender','Female')->count();

        return Inertia::render('Midwife/Reports/PerGender',[
            'male'=>$male,
            'female'=>$female,
        ]);
    }

    public function perDeliveryType()
    {
        $deliveryTypes = Pregnancy::DELIVERY_TYPE;
        $data = [];
        foreach ($deliveryTypes as $key => $value) {
            $data[] = [
                'label'=>$value,
                'value'=>Pregnancy::where('delivery_type',$key)->count(),
            ];
        }
        return Inertia::render('Midwife/Reports/PerDeliveryType',[
            'data'=>$data,
        ]);
    }

    public function listOfPregnant()
    {
        $pregnancies = Pregnancy::where('active',true)
                    ->with('patient')
                    ->get();

        return Inertia::render('Midwife/Reports/ListOfPregnant',[
            'pregnancies'=>$pregnancies,
        ]);
    }

    public function listOfInfants()
    {
        $infants = Infant::get();

        return Inertia::render('Midwife/Reports/ListOfInfants',[
            'infants'=>$infants,
        ]);
    }
    public function listOfSchedules()
    {   
        $scope = Request::input('scope');
        return Inertia::render('Midwife/Reports/listOfSchedules',[
            'schedules'=>CheckUp::query()
                        ->when($scope!='',function($query)use($scope){
                            if ($scope == 'upcoming') {
                                $query->where('done_at',null);
                            }else{
                                $query->whereNotNull('done_at');
                            }
                        })
                        ->with('patient')
                        ->get()
                        ->map(function($checkup){
                            return [
                                'id'=>$checkup->id,
                                'patient'=>$checkup->patient->full_name,
                                'date'=>Carbon::parse($checkup->date_at)->format('M d, Y h:i A')
                            ];
                        }),
            'filters'=>Request::only(['scope'])
        ]);
    }

    public function patientInfo(Patient $patient)
    {
        $types =  Pregnancy::DELIVERY_TYPE;
        return Inertia::render('Midwife/Reports/PatientAndInfant',[
            'patient'=>$patient->load('purok'),
            'pregnancies'=>Pregnancy::where('patient_id',$patient->id)
                ->with('infants')
                ->get()
                ->map(function($pregnancy)use($types){
                    return [
                        'id'=>$pregnancy->id,
                        'delivery_type'=>$pregnancy->delivery_type,
                        'delivery_date'=>Carbon::parse($pregnancy->delivery_date)->format('M d, Y h:i A'),
                        'infants'=>$pregnancy->infants
                    ];
             }),
             'types'=>$types,
        ]);
    }
}

