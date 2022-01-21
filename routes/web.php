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
Route::middleware(['auth'])->group(function(){
Route::get('/home', 'HomeController@index')->name('home');

// EMPLOYEES ROUTES

Route::get('employees', 'EmployeeController@index')->name('employees.index');
Route::post('/employees/store', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/delete/{employee}', 'EmployeeController@destroy')->name('employees.destroy');
Route::get('/employees/edit/{emp}', 'EmployeeController@edit')->name('employees.edit');
Route::put('/employees/update/{employee}', 'EmployeeController@update')->name('employees.update');
Route::get('/employees/access/{employee}', 'EmployeeController@access_911')->name('employees.access');
Route::post('/employees/import', 'EmployeeController@import')->name('employees.import');
Route::get('/employees/history/{employee}', 'EmployeeController@history')->name('employees.history');
Route::post('/employees/history/', 'EmployeeController@history_results')->name('employees.history_results');

// DEPARTMENTS ROUTES

Route::get('departments', 'DepartmentController@index')->name('department.index');
Route::post('/departments/store', 'DepartmentController@store')->name('department.store');
Route::get('/departments/delete/{department}', 'DepartmentController@destroy')->name('department.destroy');
Route::get('/departments/edit/{dept}', 'DepartmentController@edit')->name('department.edit');
Route::put('/departments/update/{department}', 'DepartmentController@update')->name('department.update');

// ADMIN ROUTES
Route::get('admin', 'AdminController@index')->name('admin.index');
Route::post('/admin/store', 'AdminController@store')->name('admin.store');
Route::get('/admin/delete/{admin}', 'AdminController@destroy')->name('admin.destroy');
Route::get('/admin/edit/{admin}', 'AdminController@edit')->name('admin.edit');
Route::put('/admin/update/{admin}', 'AdminController@update')->name('admin.update');
});

Route::get('room-911', 'AccessRoomController@index')->name('access.index')->middleware('access');
