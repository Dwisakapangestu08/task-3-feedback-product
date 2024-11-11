<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiFeedback;

Route::get('/feedback', [ApiFeedback::class, 'index']);
Route::post('/feedback', [ApiFeedback::class, 'input_feedback']);
