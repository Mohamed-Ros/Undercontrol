<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursePageController;

Route::get('/', function () {
    return view('home');
});

Route::get('/course/{id}', [CoursePageController::class, 'show']);
