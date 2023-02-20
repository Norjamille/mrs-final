<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Models\Infant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
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
}
