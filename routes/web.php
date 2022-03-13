<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('company',CompanyController::class);
Route::get('/employee/search',[EmployeeController::class,'filterEmployee'])->name('employee.filterEmployee');
Route::resource('employee', EmployeeController::class);
Route::get('/client/search',[ClientController::class,'filterClient'])->name('client.filterClient');
Route::resource('client', ClientController::class);
