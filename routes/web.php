<?php

use App\Http\Controllers\HeadlessController;
use Illuminate\Support\Facades\Route;


use Providers\RouteServiceProvider;



Route::middleware(['throttle:access'])->group( function() {
    Route::get('/', [HeadlessController::class, 'index']);
});

Route::middleware(['throttle:access'])->group( function() {
    Route::get('/myself', [HeadlessController::class, 'myself']);
});

Route::middleware(['throttle:graph'])->group( function() {
    Route::get('/graph', [HeadlessController::class, 'graph_work']);
});

Route::middleware(['throttle:graph'])->group( function() {
    Route::get('/myself/graph', [HeadlessController::class, 'graph_myself']);
});

