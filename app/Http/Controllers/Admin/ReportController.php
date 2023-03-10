<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Purok;
use App\Models\Infant;
use App\Models\CheckUp;
use App\Models\Pregnancy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class ReportController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Reports/Index');
    }

    public function perPurok()
    {
        // get all puroks with count of patients where has pregnancy where active is true
        $puroks = Purok::withCount(['patients' => function ($query) {
            $query->whereHas('pregnancies', function ($query) {
                $query->where('active', true);
            });
        }])->get();
        return Inertia::render('Admin/Reports/PerPurok',[
            'puroks'=>$puroks,
        ]);
    }

    public function perGender()
    {
        $male = Infant::where('gender','Male')->count();
        $female = Infant::where('gender','Female')->count();

        return Inertia::render('Admin/Reports/PerGender',[
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
        return Inertia::render('Admin/Reports/PerDeliveryType',[
            'data'=>$data,
        ]);
    }

    public function listOfPregnant()
    {
        $pregnancies = Pregnancy::where('active',true)
                    ->with('patient')
                    ->get();

        return Inertia::render('Admin/Reports/ListOfPregnant',[
            'pregnancies'=>$pregnancies,
        ]);
    }

    public function listOfInfants()
    {
        $infants = Infant::get();

        return Inertia::render('Admin/Reports/ListOfInfants',[
            'infants'=>$infants,
        ]);
    }
    public function listOfSchedules()
    {   
        $scope = Request::input('scope');
        return Inertia::render('Admin/Reports/listOfSchedules',[
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
}
