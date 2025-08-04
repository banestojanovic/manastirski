<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the API',
        'status' => 'success'
    ]);
})->name('home');
