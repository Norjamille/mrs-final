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

require __DIR__.'/auth.php';
