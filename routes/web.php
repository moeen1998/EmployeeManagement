<?php

use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DataController;
use App\Http\Controllers\Backend\DepartementController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\StatesController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('states', StatesController::class);
Route::resource('cities', CityController::class);
Route::resource('departements', DepartementController::class);
Route::resource('employees', EmployeeController::class);
Route::get('/state/{country}', [DataController::class,'getstates'] );
Route::get('/city/{state}', [DataController::class,'getcity'] );
