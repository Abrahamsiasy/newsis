<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Clinic\QueueController;
use App\Http\Controllers\Clinic\DoctorController;
use App\Http\Controllers\Clinic\ReceptionController;
use App\Http\Controllers\Clinic\LabController;
use App\Http\Controllers\Clinic\LabQueueController;
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
    if (Auth::user()) {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('rec');
        } elseif (Auth::user()->role_id == 2) {
            return redirect()->route('doctor');
        } elseif (Auth::user()->role_id == 3) {
            return redirect()->route('lab');
        }
    }

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});




//student list routes

Route::middleware(['auth', 'user'])->group(function () { //user
    Route::get('clinic/reception', [ReceptionController::class, 'index'])->name('rec');
    Route::post('clinic/reception/{student}', [ReceptionController::class, 'show']);
});


// //Doctor
// Route::group(['prefix' => 'clinic', 'as' => 'doctor.', 'middleware' => ['auth', 'doctor']], function () {
// Route::middleware('auth')->group(['prefix' => 'clinic'], function () {
Route::middleware(['auth', 'doctor'])->group(function () {
    Route::get('clinic/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::post('clinic/doctor/detail/record/lab/{student}', [DoctorController::class, 'storeLabRequests']);
    Route::post('clinic/doctor/detail/record/med/{student}',  [DoctorController::class, 'storeMedRecord']);
    Route::put('clinic/doctor/detail/record/med/{student}',  [DoctorController::class, 'updateMedRecord'])->name('updateMedRecord');
    Route::post('clinic/doctor/detail/record/personal/{student}',  [DoctorController::class, 'storePersonalRecord']);
    Route::post('clinic/doctor/detail/record/basic/{student}',  [DoctorController::class, 'updateBasicRecord']); //basic collaps blood highet wehigt
    Route::post('clinic/doctor/detail/record/basicg/{student}',  [DoctorController::class, 'updateGBasicRecord']); //gitls basic info
    Route::get('clinic/doctor/detail/{student}',  [DoctorController::class, 'show'])->name('showStudent');
    Route::delete('clinic/doctor/detail/{student}',  [DoctorController::class, 'delete']);
    Route::post('clinic/doctor/detail/status/{student}',  [DoctorController::class, 'changeMedicalRecordStatus']);
    Route::get('clinic/doctor/getRoom/',  [DoctorController::class, 'getRoom'])->name('doctor.getroom');
    Route::post('clinic/doctor/changeRoom/',  [DoctorController::class, 'changeRoom'])->name('doctor.changeRoom');
    Route::get('clinic/doctor/getDoctor/',  [DoctorController::class, 'getDoctor'])->name('doctor.getdoctor');
    Route::post('clinic/doctor/changeDoctor/',  [DoctorController::class, 'changeDoctor'])->name('doctor.changeDoctor');
    Route::get('clinic/doctor/list/',  [DoctorController::class, 'listPatientRecords'])->name('doctor.listPatientRecords');
    Route::put('clinic/doctor/detail/record/edit/personal/{student}',  [DoctorController::class, 'updatePersonalMedRecord'])->name('updatePersonalMedRecord');

    Route::delete('clinic/doctor/student/detail/med/delete/{med}',  [DoctorController::class, 'deleteMedication']);
    Route::delete('clinic/doctor/student/detail/personal/delete/{med}',  [DoctorController::class, 'deletePersonalMedRecord']);

    
});
// Route::group(['prefix' => 'clinic', 'as' => 'lab.', 'middleware' => ['auth', 'lab']], function () {
// Route::middleware('auth')->group(['prefix' => 'clinic'], function () {
Route::middleware(['auth', 'lab'])->group(function () { //lab
    Route::get('clinic/lab', [LabController::class, 'index'])->name('lab');
    Route::get('clinic/lab/detail/{student}/{labRequest}', [LabController::class, 'show']);
    Route::get('clinic/lab/getRoom/',  [LabController::class, 'getRoom'])->name('lab.getroom');
    Route::post('clinic/lab/changeRoom/',  [LabController::class, 'changeRoom'])->name('lab.changeRoom');
    Route::post('clinic/lab/detail/{student}/{labRequest}', [LabController::class, 'storeLabResults']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('clinic/queue', [QueueController::class, 'index'])->name('queue');
    Route::get('clinic/labqueue', [LabQueueController::class, 'index']);
});
