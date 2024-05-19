<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignalLightsController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/signal-lights',[SignalLightsController::class,'index']);

Route::post('/signal-lights/sumbitAction',[SignalLightsController::class,'sumbitAction']);

Route::get('/signal-lights/last',[SignalLightsController::class,'start']);