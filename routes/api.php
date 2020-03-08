<?php

use Illuminate\Support\Facades\Route;

/**
 * Auth routes
 */
Route::prefix('auth')->group(function() {
    Route::post('register', 'Auth\AuthController@register');
    Route::post('login', 'Auth\AuthController@login');
    Route::post('refresh', 'Auth\AuthController@refresh');

    Route::middleware('auth:api')->group(function () {
        Route::get('/user', 'Auth\AuthController@user');
        Route::post('/logout', 'Auth\AuthController@logout');
    });
});

/**
 * Ad routes
 */
Route::prefix('ads')->group(function() {
    Route::get('/', 'AdController@getAds');
    Route::get('/{id}', 'AdController@getAd');

    Route::middleware('auth:api')->group(function() {
        Route::get('/user/{id}', 'AdController@getUserAds');
        Route::post('/', 'AdController@createAd');
        Route::put('/{id}', 'AdController@updateAd')->name('updateAd');
        Route::delete('/{id}', 'AdController@deleteAd')->name('deleteAd');
        Route::get('subcategories/{id}', 'AdController@getSubCategories');
    });
});
