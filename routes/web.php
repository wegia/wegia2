<?php

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
//Routes for People 
////////////////////////
Route::get('/people', 'App\Http\Controllers\PeopleController@index')->name("peopleMain");
Route::get('/people/employees/adm', 'App\Http\Controllers\PeopleController@employees')->name("peopleEmployeesMain");
Route::get('/people/beneficiaries/adm', 'App\Http\Controllers\PeopleController@beneficiaries')->name("peopleBeneficiariesMain");
Route::get('/people/events/adm', 'App\Http\Controllers\PeopleController@events')->name("peopleEventsMain");

////////////////////////
//Routes for Employees 
////////////////////////
//CRUD routes
Route::get('/people/employees', 'App\Http\Controllers\EmployeeController@list');
// Route::get('/people/employees/{id}', 'App\Http\Controllers\EmployeeController@get')->where('id', '[0-9]+');
Route::post('/people/employees', 'App\Http\Controllers\EmployeeController@save');

//navigation routes
Route::get('/people/employees/add', 'App\Http\Controllers\EmployeeController@add');


Route::get('/people/employees/checkCPF', 'App\Http\Controllers\EmployeeController@checkCPF');
