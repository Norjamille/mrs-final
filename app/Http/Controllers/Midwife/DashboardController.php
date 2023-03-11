<?php

namespace App\Http\Controllers\Midwife;

use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function queryReports()
    {
        $total_patient_query = DB::table('patients')->select([
            DB::raw('"total_patients" as label'),
            DB::raw('count(*) as value')
        ]);

        $total_infant_query = DB::table('infants')->select([
            DB::raw('"total_infants" as label'),
            DB::raw('count(*) as value')
        ]);


        $total_users_query = DB::table('users')->select([
            DB::raw('"total_users" as label'),
            DB::raw('count(*) as value')
        ]);


        return $total_patient_query
                ->unionAll($total_infant_query)
                ->unionAll($total_users_query)
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->label => $item->value];
                })->toArray();
    }   

    public function index()
    {
        return Inertia::render('Midwife/Dashboard',[
            'total_patients' => $this->queryReports()['total_patients'],
            'total_infants' => $this->queryReports()['total_infants'],
            'total_users' => $this->queryReports()['total_users'],
        ]);
    }
}
