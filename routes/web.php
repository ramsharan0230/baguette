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

Route::get('/test', 'FrontTestController@info')->name('test');

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
    Route::post('inspection/unApproved_by_siteman', 'SiteManagerController@unApprovedBySiteMan')->name('inspection.unapproved_by_siteman');
});

Route::group(['middleware'=>'OpManager'], function(){
    Route::get('opmanager', 'OperationManagerController@index')->name('opmanager');
    Route::get('inspection/{id}/approvedByOpManager', 'OperationManagerController@approvedByOpMan')->name('inspection.approvedByOpManager');
    Route::post('inspection/unApprovedByOpManager', 'OperationManagerController@unApprovedByOpMan')->name('inspection.unApprovedByOpManager');
});

Route::group(['middleware'=>'SrOpManager', 'prefix'=>'sropmanager'], function(){
    Route::get('/', 'SeniorOperationManagerController@index')->name('sropmanager');
    Route::get('users', 'SeniorOperationManagerController@users')->name('sropmanager.users');
    Route::post('changeRole', 'SeniorOperationManagerController@changeRole')->name('sropmanager.changeRole');
    Route::get('user/{id}/changeStatus', 'SeniorOperationManagerController@changeStatus')->name('sropmanager.user.changeStatus');
    Route::get('user/{id}/suspend', 'SeniorOperationManagerController@suspendUser')->name('sropmanager.user.suspend');
    Route::get('user/{id}/unsuspend', 'SeniorOperationManagerController@unSuspendUser')->name('sropmanager.user.unsuspend');

    Route::get('inspection/{id}/approvedBySrOpMan', 'SeniorOperationManagerController@approvedBySrOpMan')->name('inspection.approvedBySrOpMan');
    Route::post('inspection/unapprovedBySrOpMan', 'SeniorOperationManagerController@unApprovedBySrOpMan')->name('inspection.unapprovedBySrOpMan');
    
});

