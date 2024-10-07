<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('about-us');
});
Route::post('/generate-resume', [ResumeController::class, 'generate']);



