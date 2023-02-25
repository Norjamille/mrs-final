<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Purok;
use App\Models\Infant;
use App\Models\Pregnancy;
use App\Http\Controllers\Controller;

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
}
