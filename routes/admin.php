<?php

Route::prefix('admin/dashboard')
->controller(\App\Http\Controllers\Admin\DashboardController::class)
->middleware(['auth', 'role:Admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.dashboard');
});

Route::prefix('admin/users')
->controller(\App\Http\Controllers\Admin\UserController::class)
->middleware(['auth', 'role:Admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.users');
    Route::get('/create', 'create')->name('admin.users.create');
    Route::post('/', 'store')->name('admin.users.store');
    Route::get('/{user}/edit', 'edit')->name('admin.users.edit');
    Route::patch('/{user}/update', 'update')->name('admin.users.update');
    Route::delete('/{user}/delete', 'destroy')->name('admin.users.destroy');
});

Route::prefix('admin/puroks')
->controller(\App\Http\Controllers\Admin\PurokController::class)
->middleware(['auth', 'role:Admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.puroks');
    Route::get('/create', 'create')->name('admin.puroks.create');
    Route::post('/', 'store')->name('admin.puroks.store');
    Route::get('/{purok}/edit', 'edit')->name('admin.puroks.edit');
    Route::patch('/{purok}/update', 'update')->name('admin.puroks.update');
});

Route::prefix('reports')
->controller(\App\Http\Controllers\Admin\ReportController::class)
->middleware(['auth','role:Admin'])
->group(function () {
    Route::get('/', 'index')->name('admin.reports');
    Route::get('/per-purok', 'perPurok')->name('admin.reports.perPurok');
    Route::get('/per-gender', 'perGender')->name('admin.reports.perGender');
    Route::get('/per-delivery-type', 'perDeliveryType')->name('admin.reports.perDeliveryType');
    Route::get('/list-of-preganant-patient', 'listOfPregnant')->name('admin.reports.listOfPregnant');
    Route::get('/list-of-infants', 'listOfInfants')->name('admin.reports.listOfInfants');
    Route::get('/list-of-schedules', 'listOfSchedules')->name('admin.reports.listOfSchedules');
});
