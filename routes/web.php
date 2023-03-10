<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Contracts\Auth\MustVerifyEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->user()->hasRole('Admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->hasRole('Midwife')) {
        return redirect()->route('midwife.dashboard');
    } else {
       return redirect()->route('patient.dashboard');
    }
})->middleware(['auth']);

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('Admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->hasRole('Midwife')) {
        return redirect()->route('midwife.dashboard');
    } else {
        return redirect()->route('patient.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(\App\Http\Controllers\Patient\DashboardController::class)
->prefix('/patient')->middleware(["auth","role:Patient"])->group(function(){
    Route::get('/','index')->name('patient.dashboard');
});

Route::get('/patient/about/pregnancy',function(){
    return Inertia::render('Patient/Trivia');
})->middleware(['auth','role:Patient']);

Route::get('/account', function (Request $request) {
    return Inertia::render('Account/Index',[
        'isAdmin'=>auth()->user()->hasRole('Admin'),
        'isMidwife'=>auth()->user()->hasRole('Midwife'),
        'isPatient'=>auth()->user()->hasRole('Patient'),
    ]);
})->middleware(['auth', 'verified'])->name('account');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/vaccinated/reports',function(){
    $count = \App\Models\Infant::whereHas('vaccinations')->count();
    return view('reports.vaccinated',[
        'count'=>$count
    ]);
});

Route::get('/per-delivery-type/reports',function(){
    $deliveryTypes = \App\Models\Pregnancy::DELIVERY_TYPE;
    $data = [];
    foreach ($deliveryTypes as $key => $value) {
        $data[] = [
            'label'=>$value,
            'value'=>\App\Models\Pregnancy::where('delivery_type',$key)->count(),
        ];
    }
    return view('reports.per-delivery-type',[
        'data'=>$data,
    ]);
});


Route::get('/per-gender/report',function(){
    $male = \App\Models\Infant::where('gender','Male')->count();
    $female = \App\Models\Infant::where('gender','Female')->count();

    return view('reports.per-gender',[
        'male'=>$male,
        'female'=>$female,
    ]);
});

Route::get('/per-purok/reports',function(){
    $puroks = \App\Models\Purok::withCount(['patients' => function ($query) {
        $query->whereHas('pregnancies', function ($query) {
            $query->where('active', true);
        });
    }])->get();
    return view('reports.per-purok',[
        'puroks'=>$puroks,
    ]);
});

require __DIR__.'/auth.php';
