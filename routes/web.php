<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/**
 * User Routes
 * ----------------------------------------------------------------------------------
 */
Route::resource('users', UserController::class);   
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');

/**
 * Department Routes
 */
Route::resource('departments', DepartmentController::class);
/**
 * Country Routes
 */
Route::resource('countries', CountryController::class);
/**
 * State Routes
 */
Route::resource('states', StateController::class);
/**
 * City Routes
 */
Route::resource('cities', CityController::class);

/**
 * 
 * Route redirect every thing else to employees
 */
Route::get('{any}', function () {
    return view('employees.index');
})->where('any', '.*');