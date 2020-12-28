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
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'hygiene', 'prefix'=>'hygiene'], function(){
    Route::get('/', 'HygieneController@index')->name('hygiene');
    Route::resource('inspection', 'InspectionController');
    Route::post('inspection/edit/location', 'InspectionController@editLocation')->name('inspection.edit.location');
    Route::post('inspection/edit/date', 'InspectionController@editDate')->name('inspection.edit.date');
    Route::post('inspection/edit/findgings', 'InspectionController@editFindings')->name('inspection.edit.findings');
    Route::post('inspection/edit/pca', 'InspectionController@editPca')->name('inspection.edit.pca');
    Route::post('inspection/edit/accountability', 'InspectionController@editAccountability')->name('inspection.edit.accountability');
    Route::post('inspection/edit/status', 'InspectionController@editStatus')->name('inspection.edit.status');
    Route::post('inspection/edit/closing', 'InspectionController@editClosingDate')->name('inspection.edit.closing');
    Route::get('inspection/{id}/approve', 'InspectionController@approveInspection')->name('inspection.approve');
    Route::post('inspection/{id}/assign', 'InspectionController@assignInspection')->name('inspection.assign');
});

Route::group(['middleware'=>'sitemanager'], function(){
    Route::get('sitemanager', 'SiteManagerController@index')->name('sitemanager');
    Route::get('inspection/{id}/approved_by_siteman', 'SiteManagerController@approvedBySiteMan')->name('inspection.approved_by_siteman');
});

Route::group(['middleware'=>'OpManager'], function(){
    Route::get('opmanager', 'OperationManagerController@index')->name('opmanager');
});

Route::group(['middleware'=>'SrOpManager'], function(){
    Route::get('sropmanager', 'SeniorOperationManagerController@index')->name('sropmanager');
    Route::get('sropmanager/users', 'SeniorOperationManagerController@users')->name('sropmanager.users');
    Route::post('sropmanager/changeRole', 'SeniorOperationManagerController@changeRole')->name('sropmanager.changeRole');
    Route::post('sropmanager/user/{id}/changeStatus', 'SeniorOperationManagerController@changeStatus')->name('sropmanager.user.changeStatus');
});

