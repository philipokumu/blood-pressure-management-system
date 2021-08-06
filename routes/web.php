<?php

use App\Http\Controllers\PatientBloodPressureController;
use App\Http\Controllers\PracticeStaffExportController;
use App\Http\Livewire\AllPatients;
use App\Http\Livewire\AllUsers;
use App\Http\Livewire\BloodPressureTable;
use App\Http\Livewire\CreateBloodPressure;
use App\Http\Livewire\CreatePatient;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\PatientBloodPressureList;
use App\Http\Livewire\PatientTable;
use App\Http\Livewire\UpdateBloodPressure;
use App\Http\Livewire\UpdatePatient;
use App\Http\Livewire\UpdateUser;
use App\Http\Livewire\UserTable;
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
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/patients', AllPatients::class)->name('patients.list');
    Route::get('/patients/create', CreatePatient::class)->name('patients.create');
    Route::get('/patients/{patient}', UpdatePatient::class)->name('patients.edit');
    Route::get('/patients/{patient}/bloodPressures', PatientBloodPressureList::class)->name('pressures.list');
    Route::get('/patients/{patient}/bloodPressures/create', CreateBloodPressure::class)->name('pressures.create');
    Route::get('/patients/{patient}/bloodPressures/{bloodPressure}', UpdateBloodPressure::class)->name('pressures.edit');
    Route::get('/users', AllUsers::class)->name('users.list');
    Route::get('/users/create', CreateUser::class)->name('users.create');
    Route::get('users/export', [PracticeStaffExportController::class, 'export'])->name('users.export');
    Route::get('/users/{user}', UpdateUser::class)->name('users.edit');
    Route::get('patients/{patient}/export', [PatientBloodPressureController::class, 'export'])->name('pressures.export');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
