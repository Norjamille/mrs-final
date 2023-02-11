<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index()
    {
        return Inertia::render('Midwife/Reports/Index');
    }
}
