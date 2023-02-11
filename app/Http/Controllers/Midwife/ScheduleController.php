<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    public function index()
    {
        return Inertia::render('Midwife/Schedules/Index');
    }
}
