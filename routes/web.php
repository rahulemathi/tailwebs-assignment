<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/',[TeacherController::class,'index']);
    Route::post('/add-student',[StudentController::class,'add']);
    Route::post('/update',[StudentController::class,'update']);
    Route::post('/delete/{id}',[StudentController::class,'delete']);
});
