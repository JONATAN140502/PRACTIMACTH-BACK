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
Route::prefix('/login')->group( function (){
    Route::post('/logincompany','App\Http\Controllers\LoginController@logincompany');   
    Route::post('/loginstudent','App\Http\Controllers\LoginController@loginstudent');    
    Route::post('/loginadmin','App\Http\Controllers\LoginController@loginadmin'); 
    Route::post('/logoutcompany','App\Http\Controllers\LoginController@salircompany');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('match')->group(function (){
    Route::post('/filterPractices', 'App\Http\Controllers\MatchController@filterPractices')->name('match.filterPractices');
    Route::post('/store', 'App\Http\Controllers\MatchController@store')->name('match.store');
    Route::get('/{id}/show', 'App\Http\Controllers\MatchController@show')->name('match.show');
    Route::post('/myMatches', 'App\Http\Controllers\MatchController@myMatches')->name('match.myMatches');
    Route::post('/practicesMatch', 'App\Http\Controllers\MatchController@practicesMatch')->name('match.practicesMatch');
    Route::post('/destroy', 'App\Http\Controllers\MatchController@destroy')->name('match.destroy');

    

});
Route::prefix('company')->group(function (){
    Route::get('/', 'App\Http\Controllers\CompanyController@index')->name('company.index');
    Route::post('/storearea','App\Http\Controllers\CompanyController@storearea')->name('company.storearea');
    Route::post('/filterAreas','App\Http\Controllers\CompanyController@filterAreas')->name('company.filterAreas');
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

Route::prefix('specialty')->group(function (){
    Route::get('/', 'App\Http\Controllers\specialtyController@index')->name('specialty.index');
    Route::post('/store', 'App\Http\Controllers\specialtyController@store')->name('specialty.store');
    Route::post('/filter', 'App\Http\Controllers\specialtyController@filter')->name('specialty.filter');
    Route::get('/{id}/show', 'App\Http\Controllers\specialtyController@show')->name('specialty.show');
    Route::post('/update', 'App\Http\Controllers\specialtyController@update')->name('specialty.update');
    Route::post('/destroy', 'App\Http\Controllers\specialtyController@destroy')->name('specialty.destroy');

});

Route::prefix('subspecialty')->group(function (){
    Route::get('/', 'App\Http\Controllers\subspecialtyController@index')->name('subspecialty.index');
    Route::post('/store', 'App\Http\Controllers\subspecialtyController@store')->name('subspecialty.store');
    Route::post('/filter', 'App\Http\Controllers\subspecialtyController@filter')->name('subpecialty.filter');
    Route::get('/{id}/show', 'App\Http\Controllers\subspecialtyController@show')->name('subspecialty.show');
    Route::post('/update', 'App\Http\Controllers\subspecialty@update')->name('subspecialty.update');
    Route::post('/destroy', 'App\Http\Controllers\subspecialtyController@destroy')->name('subspecialty.destroy');

});

Route::prefix('knowledge')->group(function (){
    Route::get('/', 'App\Http\Controllers\KnowledgeController@index')->name('knowledge.index');
    Route::post('/store', 'App\Http\Controllers\knowledgeController@store')->name('knowledge.store');
    Route::post('/filter', 'App\Http\Controllers\knowledgeController@filter')->name('knowledge.filter');
    Route::get('/{id}/show', 'App\Http\Controllers\knowledgeController@show')->name('knowledge.show');
    Route::post('/update', 'App\Http\Controllers\knowledgeController@update')->name('knowledge.update');
    Route::post('/destroy', 'App\Http\Controllers\knowledgeController@destroy')->name('knowledge.destroy');

});
Route::prefix('faculty')->group(function (){
    Route::get('/', 'App\Http\Controllers\FacultyController@index')->name('faculty.index');
    Route::post('/store', 'App\Http\Controllers\FacultyController@store')->name('faculty.store');
    Route::get('/{id}/show', 'App\Http\Controllers\FacultyController@show')->name('faculty.show');
    Route::post('/update', 'App\Http\Controllers\FacultyController@update')->name('faculty.update');
    Route::post('/destroy', 'App\Http\Controllers\FacultyController@destroy')->name('faculty.destroy');
    Route::post('/filter', 'App\Http\Controllers\FacultyController@filter')->name('faculty.filter');
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
    Route::post('/storeknowledge', 'App\Http\Controllers\StudentController@storeknowledge')->name('student.storeknowledge');
    Route::post('/filterKnowledge', 'App\Http\Controllers\StudentController@filterKnowledge')->name('student.filterKnowledge');
});
Route::prefix('user')->group(function (){
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::post('/filter','App\Http\Controllers\UserController@filter')->name('user.filter');
    Route::post('/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/{id}/show', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::post('/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/destroy', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

});

Route::prefix('practice')->group(function (){
    Route::get('/', 'App\Http\Controllers\PracticeController@index')->name('practice.index');
    Route::post('/store', 'App\Http\Controllers\PracticeController@store')->name('practice.store');
    Route::post('/filter', 'App\Http\Controllers\PracticeController@filter')->name('practice.filter');
    Route::get('/{id}/show', 'App\Http\Controllers\PracticeController@show')->name('practice.show');
    Route::post('/update', 'App\Http\Controllers\PracticeController@update')->name('practice.update');
    Route::post('/destroy', 'App\Http\Controllers\PracticeController@destroy')->name('practice.destroy');

});
Route::prefix('consulta')->group(function (){
    Route::post('/dni', 'App\Http\Controllers\ApiController@dni')->name('consulta.dni');
    Route::post('/ruc', 'App\Http\Controllers\ApiController@ruc')->name('consulta.ruc');

});