<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('company')->group(function (){
    Route::get('/', 'App\Http\Controllers\CompanyController@index')->name('company.index');
    Route::post('/filter','App\Http\Controllers\CompanyController@filter')->name('company.filter');
    Route::post('/store', 'App\Http\Controllers\CompanyController@store')->name('company.store');
    Route::get('/{id}/show', 'App\Http\Controllers\CompanyController@show')->name('company.show');
    Route::post('/update', 'App\Http\Controllers\CompanyController@update')->name('company.update');
    Route::post('/destroy', 'App\Http\Controllers\CompanyController@destroy')->name('company.destroy');

});

Route::prefix('area')->group(function (){
    Route::get('/', 'App\Http\Controllers\areaController@index')->name('area.index');
    Route::post('/store', 'App\Http\Controllers\areaController@store')->name('area.store');
    Route::get('/{id}/show', 'App\Http\Controllers\areaController@show')->name('area.show');
    Route::post('/update', 'App\Http\Controllers\areaController@update')->name('area.update');
    Route::post('/destroy', 'App\Http\Controllers\areaController@destroy')->name('area.destroy');

});