<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Models\Infant;
use App\Models\Vaccination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use \Illuminate\Http\Request as FormRequest;
use Inertia\Inertia;

class InfantController extends Controller
{
    public function index()
    {
        $search = Request::input('search');

        return Inertia::render('Midwife/Infants/Index', [
            'infants' => Infant::query()
                    ->when($search, function ($query) use ($search) {
                        $query->where('first_name', 'like', "%{$search}%")
                                ->orWhere('last_name', 'like', "%{$search}%");
                    })
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn ($infant) => [
                        'id' => $infant->id,
                        'full_name' => $infant->first_name.' '.$infant->last_name,
                        'gender' => $infant->gender,
                        'date_of_birth' => Carbon::parse($infant->date_of_birth)->format('M d, Y h:m:s A'),
                    ]),
            'filters' => Request::only(['search', 'status']),
        ]);
    }

    public function vaccine(Infant $infant)
    {
        return Inertia::render('Midwife/Infants/Vaccine',[
            'infant'=>$infant,
            'vaccinations'=>$infant->vaccinations,
            'filters'=>Request::only(['search'])
        ]);
    }

    public function addVaccine(Infant $infant)
    {
        return Inertia::render('Midwife/Infants/AddVaccine',[
            'infant'=>$infant,
            'vaccines'=>Vaccination::VACCINES,
            'months' => Vaccination::MONTHS
        ]);
    }

    public function storeVaccination(FormRequest $request)
    {
        $data = $request->validate([
            'infant_id'=>'required',
            'vaccine'=>'required',
            'months_after_birth'=>'required',
            'date_at'=>'required'
        ]);

        Vaccination::create($data);

        return redirect()->route('midwife.infants')->with('toast',[
            'type'=>'success',
            'message'=>'Record has been added'
        ]);
    }
}
