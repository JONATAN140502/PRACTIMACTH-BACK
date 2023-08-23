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
Route::prefix('faculty')->group(function (){
    Route::get('/', 'App\Http\Controllers\FacultyController@index')->name('faculty.index');
    Route::post('/filter','App\Http\Controllers\FacultyController@filter')->name('faculty.filter');
    Route::post('/store', 'App\Http\Controllers\FacultyController@store')->name('faculty.store');
    Route::get('/{id}/show', 'App\Http\Controllers\FacultyController@show')->name('faculty.show');
    Route::post('/update', 'App\Http\Controllers\FacultyController@update')->name('faculty.update');
    Route::post('/destroy', 'App\Http\Controllers\FacultyController@destroy')->name('faculty.destroy');

});
Route::prefix('school')->group(function (){
    Route::get('/', 'App\Http\Controllers\SchoolController@index')->name('school.index');
    Route::post('/filter','App\Http\Controllers\SchoolController@filter')->name('school.filter');
    Route::post('/store', 'App\Http\Controllers\SchoolController@store')->name('school.store');
    Route::get('/{id}/show', 'App\Http\Controllers\SchoolController@show')->name('school.show');
    Route::post('/update', 'App\Http\Controllers\SchoolController@update')->name('school.update');
    Route::post('/destroy', 'App\Http\Controllers\SchoolController@destroy')->name('school.destroy');

});
Route::prefix('student')->group(function (){
    Route::get('/', 'App\Http\Controllers\StudentController@index')->name('student.index');
    Route::post('/filter','App\Http\Controllers\StudentController@filter')->name('student.filter');
    Route::post('/store', 'App\Http\Controllers\StudentController@store')->name('student.store');
    Route::get('/{id}/show', 'App\Http\Controllers\StudentController@show')->name('student.show');
    Route::post('/update', 'App\Http\Controllers\StudentController@update')->name('student.update');
    Route::post('/destroy', 'App\Http\Controllers\StudentController@destroy')->name('student.destroy');

});
Route::prefix('user')->group(function (){
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::post('/filter','App\Http\Controllers\UserController@filter')->name('user.filter');
    Route::post('/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/{id}/show', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::post('/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/destroy', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

});