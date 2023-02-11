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
->controller(\App\Http\Controllers\Midwife\PatientPregnancyController::class)
->group(function () {
    Route::get('/{patient}/pregnancy/create', 'create')->name('midwife.pregnancy.create');
    Route::post('/{patient}/pregnancy', 'store')->name('midwife.pregnancy.store');
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
});

Route::prefix('midwife/schedules')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\ScheduleController::class)
->group(function () {
    Route::get('/', 'index')->name('midwife.schedules');
});

Route::prefix('midwife/reports')
->middleware(['auth', 'role:Midwife'])
->controller(\App\Http\Controllers\Midwife\ReportController::class)
->group(function () {
    Route::get('/', 'index')->name('midwife.reports');
});
