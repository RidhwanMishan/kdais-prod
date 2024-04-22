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

// Microsoft Graph
Route::get('/signin', 'AuthController@signin')->name('signin');
Route::get('/callback', 'AuthController@callback')->name('callback');
Route::get('/signout', 'AuthController@signout')->name('signout');

Route::get('/', 'HomeController@index')->name('main');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', 'UsersController');
    Route::get('/active_license','ActiveLicenseController')->name('users.queue_active_license');

});

Route::namespace('Sales')->prefix('sales')->group(function(){
    Route::get('/dealer','SDealerController')->name('sales.dealer');

    Route::get('/product_availibility/dealer','SProductAvailibilityController')->name('sales.product_availibility');
    Route::get('/product_availibility/sku','SProductAvailibilitySKUController')->name('sales.product_availibility_sku');
    Route::get('/product_availibility/location','SProductAvailibilityLocationController')->name('sales.product_availibility_location');

    Route::get('/business_report/sales_tracker','SBusinessReportController')->name('sales.business_report');
    Route::get('/business_report/sales_cycle','SBusinessReportAnalysisController')->name('sales.business_report_analysis');
});