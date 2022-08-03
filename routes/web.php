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

Route::get('/',  'HomeController@index');

////////////////////////
//Routes for People 
////////////////////////
Route::get('/people', 'PeopleController@index');
Route::get('/people/employees/adm', 'PeopleController@employees');
Route::get('/people/beneficiaries/adm', 'PeopleController@beneficiaries');
Route::get('/people/events/adm', 'PeopleController@events');

////////////////////////
//Routes for Employees 
////////////////////////
//CRUD routes
Route::get('/people/employees', 'EmployeeController@list');
Route::get('/people/employees/{id}', 'EmployeeController@get')->where('id', '[0-9]+');
Route::post('/people/employees', 'EmployeeController@save');

//navigation routes
Route::get('/people/employees/add', 'EmployeeController@add');


Route::get('/people/employees/checkCPF', 'EmployeeController@checkCPF');
