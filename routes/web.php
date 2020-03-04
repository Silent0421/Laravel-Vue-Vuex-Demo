<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Route::redirect('/', 'ads');

Route::get('/', function() {return view('app');});

Route::get('ads', 'AdController@getAds')->name('getAds');
Route::group(['prefix' =>'test'], function() {
    Auth::routes();
});



Route::group(['middleware' => 'auth', 'prefix' => 'ads'], function() {
    Route::get('create/{id?}', 'AdController@showCreateEditForm')->name('showCreateEditForm');
    Route::post('/', 'AdController@createAd')->name('createAd');
    Route::put('/{id}', 'AdController@updateAd')->name('updateAd');
    Route::delete('/{id}', 'AdController@deleteAd')->name('deleteAd');
    Route::get('subcategories/{id}', 'AdController@getSubCategories')->name('getSubCategories');
    Route::get('user/{userId}', 'AdController@getUserAds')->name('getUserAds');
});

Route::get('ads/{id}', 'AdController@getAd')->name('getAd');

Route::get('/home', 'HomeController@index')->name('home');
