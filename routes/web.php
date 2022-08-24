<?php
//namespace App\Http\Controllers;
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

Route::get('/',  'App\Http\Controllers\HomeController@index');
// Route::get('/', function() {return "teste";});
////////////////////////


////////////////////////////////Routes for RH////////////////////////////////////////////////////// 
Route::get('/rh', 'App\Http\Controllers\RhController@index')->name("rhMain");
Route::get('/rh/employees/adm', 'App\Http\Controllers\RhController@employees')->name("rhEmployeesMain");
Route::get('/rh/voluntary/voluntary/adm', 'App\Http\Controllers\RhController@voluntary')->name("rhVoluntaryMain");

//CRUD routes RH
Route::get('/rh/employees', 'App\Http\Controllers\EmployeeController@list');
Route::post('/rh/employees', 'App\Http\Controllers\EmployeeController@save');

//navigation routes
Route::get('/rh/employees/add', 'App\Http\Controllers\EmployeeController@add');
Route::get('/rh/employees/checkCPF', 'App\Http\Controllers\EmployeeController@checkCPF');


/////////////////////////////////Routes for People//////////////////////////////////////////////// 
Route::get('/people', 'App\Http\Controllers\PeopleController@index')->name("peopleMain");
Route::get('/people/beneficiaries/beneficiaries/adm', 'App\Http\Controllers\PeopleController@beneficiaries')->name("peopleBeneficiariesMain");
Route::get('/people/assisted/assisted/adm', 'App\Http\Controllers\PeopleController@assisted')->name("peopleAssistedMain");

//CRUD routes people
Route::get('/people/employees', 'App\Http\Controllers\EmployeeController@list');
Route::post('/people/employees', 'App\Http\Controllers\EmployeeController@save');

//navigation routes
Route::get('/people/employees/add', 'App\Http\Controllers\EmployeeController@add');
Route::get('/people/employees/checkCPF', 'App\Http\Controllers\EmployeeController@checkCPF');
