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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'hygiene', 'prefix'=>'hygiene'], function(){
    Route::get('/', 'HygieneController@index')->name('hygiene');
    Route::resource('inspection', 'InspectionController');
});

Route::group(['middleware'=>'sitemanager'], function(){
    Route::get('sitemanager', 'SiteManagerController@index')->name('sitemanager');
});

Route::group(['middleware'=>'OpManager'], function(){
    Route::get('opmanager', 'OperationManagerController@index')->name('opmanager');
});

Route::group(['middleware'=>'SrOpManager'], function(){
    Route::get('sropmanager', 'SeniorOperationManagerController@index')->name('sropmanager');
});

