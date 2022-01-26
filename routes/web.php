<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return redirect('/company');
});

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/company', [Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [Controllers\CompanyController::class, 'create']);
Route::get('/company/edit/{id}', [Controllers\CompanyController::class, 'edit']);
Route::get('/company/delete/{id}', [Controllers\CompanyController::class, 'delete']);
Route::post('/company', [Controllers\CompanyController::class, 'store'])->name('company');


Route::get('/employee', [Controllers\EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create/{id}', [Controllers\EmployeeController::class, 'create']);
Route::get('/employee/edit/{id}', [Controllers\EmployeeController::class, 'edit']);
Route::get('/employee/delete/{id}', [Controllers\EmployeeController::class, 'delete']);
Route::post('/employee/{id}', [Controllers\EmployeeController::class, 'store'])->name('employee');

Route::get('/client', [Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('/client/create/{id}', [Controllers\ClientController::class, 'create']);
Route::get('/client/edit/{id}', [Controllers\ClientController::class, 'edit']);
Route::get('/client/delete/{id}', [Controllers\ClientController::class, 'delete']);
Route::post('/client/{id}', [Controllers\ClientController::class, 'store']);
