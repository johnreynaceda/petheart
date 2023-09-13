<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->user_type === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('client.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//ADMINISTRATOR
Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/medicines', function () {
        return view('admin.medicines');
    })->name('admin.medicines');
    Route::get('/doctors', function () {
        return view('admin.doctors');
    })->name('admin.doctors');
    Route::get('/inventory', function () {
        return view('admin.inventory');
    })->name('admin.inventory');
    Route::get('/calendar', function () {
        return view('admin.calendar');
    })->name('admin.calendar');
    Route::get('/clients', function () {
        return view('admin.clients');
    })->name('admin.clients');
    Route::get('/animals', function () {
        return view('admin.animals');
    })->name('admin.animals');
});

//client
Route::prefix('client')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.index');
    })->name('client.dashboard');
    Route::get('/pets', function () {
        return view('client.pets');
    })->name('client.pets');
    Route::get('/appointments', function () {
        return view('client.appointments');
    })->name('client.appointments');
    Route::get('/make-appointments', function () {
        return view('client.make-appointment');
    })->name('client.make-appointments');


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';