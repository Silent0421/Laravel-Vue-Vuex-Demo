<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'ads');

Route::get('ads', 'AdController@getAds')->name('getAds');
Route::get('ads/create/{id?}', 'AdController@showCreateEditForm')->name('showCreateEditForm');
Route::get('ads/{id}', 'AdController@getAd')->name('getAd');
Route::post('ads', 'AdController@createAd')->name('createAd');
Route::put('ads/{id}', 'AdController@updateAd')->name('updateAd');
Route::delete('ads/{id}', 'AdController@deleteAd')->name('deleteAd');
Route::get('ads/subcategories/{id}', 'AdController@getSubCategories')->name('getSubCategories');
