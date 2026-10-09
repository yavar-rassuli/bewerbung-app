<?php

use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/applications');

Route::resource('applications', JobApplicationController::class);


// Route::get('/bewerbungen', [BewerbungController::class, 'index']);

// Route::post('/bewerbungen', [BewerbungController::class, 'store']);

// Route::get('/bewerbung-neu', [BewerbungController::class, 'create']);

// //delete
// Route::delete('bewerbungen/{id}',[BewerbungController::class, 'destroy']);

// //edit
// Route::get('/bewerbungen/{id}/edit', [BewerbungController::class, 'edit']);
// Route::put('/bewerbungen/{id}', [BewerbungController::class, 'update']);


