<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * Single page route
 */
Route::get('/', function() {
    return view('app');
});
