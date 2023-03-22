<?php


Route::prefix('midwife/dashboard')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\DashboardController::class)
->group(function () {
    Route::get('/', 'index')->name('midwife.dashboard');
});

Route::prefix('midwife/patients')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\PatientController::class)
->group(function () {
    Route::get('/', 'index')->name('midwife.patients');
    Route::get('/create', 'create')->name('midwife.patients.create');
    Route::post('/store', 'store')->name('midwife.patients.store');
    Route::get('/{patient}/edit', 'edit')->name('midwife.patients.edit');
    Route::patch('/{patient}/update', 'update')->name('midwife.patients.update');
    Route::delete('/{patient}/delete', 'destroy')->name('midwife.patients.delete');
});

Route::prefix('midwife/patients')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\PatientInfantController::class)
->group(function () {
    Route::get('{patient}/infant/create', 'create')->name('midwife.patients.infant.create');
    Route::post('{patient}/infant/store', 'store')->name('midwife.patients.infant.store');
    Route::get('/infant/{infant}/edit', 'edit')->name('midwife.patients.infant.edit');
    Route::patch('/infant/{infant}/update', 'update')->name('midwife.patients.infant.update');
});

Route::prefix('midwife/patients')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\PatientPregnancyController::class)
->group(function () {
    Route::get('/{patient}/pregnancy/create', 'create')->name('midwife.pregnancy.create');
    Route::post('/{patient}/pregnancy', 'store')->name('midwife.pregnancy.store');
    Route::get('/{patient}/pregnancy/edit', 'edit')->name('midwife.pregnancy.edit');
    Route::patch('/{patient}/pregnancy/update', 'update')->name('midwife.pregnancy.update');
});

Route::prefix('midwife/patients')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\PatientCheckUpScheduleController::class)
->group(function () {
    Route::get('/{patient}/check-up/schedules/create', 'create')->name('midwife.pregnancy.check-up.schedules.create');
    Route::post('/{patient}/check-up/schedules/store', 'store')->name('midwife.pregnancy.check-up.schedules.store');
});

Route::prefix('midwife/infants')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\InfantController::class)
->group(function () {
    Route::get('/', 'index')->name('midwife.infants');
    Route::get('/{infant}/vaccine', 'vaccine')->name('midwife.infants.vaccine');
    Route::get('/{infant}/add-vaccine', 'addVaccine')->name('midwife.infants.add-vaccine');
    Route::post('/store-vaccine', 'storeVaccination')->name('midwife.infants.store-vaccine');

});

Route::prefix('midwife/schedules')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\ScheduleController::class)
->group(function () {
    Route::get('/', 'index')->name('midwife.schedules');
    Route::get('/{checkup}/edit', 'edit')->name('midwife.schedules.edit');
    Route::patch('/{checkup}/update', 'update')->name('midwife.schedules.update');
});



Route::prefix('/midwife/reports')
->controller(\App\Http\Controllers\Midwife\ReportController::class)
->middleware(['auth','role:Midwife'])
->group(function () {
    Route::get('/', 'index')->name('midwife.reports');
    Route::get('/per-purok', 'perPurok')->name('midwife.reports.perPurok');
    Route::get('/per-gender', 'perGender')->name('midwife.reports.perGender');
    Route::get('/per-delivery-type', 'perDeliveryType')->name('midwife.reports.perDeliveryType');
    Route::get('/list-of-preganant-patient', 'listOfPregnant')->name('midwife.reports.listOfPregnant');
    Route::get('/list-of-infants', 'listOfInfants')->name('midwife.reports.listOfInfants');
    Route::get('/list-of-schedules', 'listOfSchedules')->name('midwife.reports.listOfSchedules');
    Route::get('/{patient}/information', 'patientInfo')->name('midwife.reports.patientInfo');
});

Route::get('/schedule-report/{patient}',function($patient){
    $patient = \App\Models\Patient::find($patient);
    $latest_pregnancy = $patient->pregnancies()->latest()->first();
    
    return view('reports.single-schedule-report',[
        'checkups' => \App\Models\CheckUp::where('pregnancy_id',$latest_pregnancy->id)->get(),
        'patient' => $patient,
    ]);
});
