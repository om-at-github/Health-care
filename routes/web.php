<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


use App\Http\Controllers\MedicalRecordController;

Route::get('/', [MedicalRecordController::class, 'index'])->name('medical-records.index');
Route::post('/records', [MedicalRecordController::class, 'store'])->name('medical-records.store');
Route::get('/qr', [MedicalRecordController::class, 'qr'])->name('medical-records.qr');
Route::get('/record/{uuid}', [MedicalRecordController::class, 'show'])->name('medical-records.show');


Route::get('/record/{uuid}', [MedicalRecordController::class, 'showPublic'])
    ->name('medical-records.public');
