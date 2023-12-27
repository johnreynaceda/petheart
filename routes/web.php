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
    if (auth()->check()) {
        if (auth()->user()->user_type === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('client.dashboard');
        }
    } else {
        return view('welcome');
    }
});

Route::get('/dashboard', function () {
    if (auth()->user()->user_type === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('client.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('contacts');

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

    Route::get('/consultation', function () {
        return view('admin.consultation');
    })->name('admin.consultation');
    Route::get('/consultation/{id}', function () {
        return view('admin.manage-consultation');
    })->name('admin.consultation-manage');
    Route::get('/services', function () {
        return view('admin.services');
    })->name('admin.services');
    Route::get('/appointment-list', function () {
        return view('admin.appointment-list');
    })->name('admin.appointment-list');
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
    Route::get('/billing', function () {
        return view('client.billing');
    })->name('client.billing');


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
