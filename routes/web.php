<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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
        abort(403);
    }
})->middleware(['auth']);

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('Admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->hasRole('Midwife')) {
        return redirect()->route('midwife.dashboard');
    } else {
        abort(403);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
