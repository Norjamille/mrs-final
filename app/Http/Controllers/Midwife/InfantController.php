<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Models\Infant;
use Inertia\Inertia;

class InfantController extends Controller
{
    public function index()
    {
        return Inertia::render('Midwife/Infants/Index',[
            'infants'=>Infant::query()
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn($pregnancy)=>[
                        
                    ])
        ]);
    }
}
