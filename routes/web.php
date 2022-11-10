<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('auth.login');
});


/* Route::get('/employees', function () {
    return view('employee.index');
  });

Route::get('/employees/create', [EmployeeController::class, 'create']); */

Route::resource('employees', EmployeeController::class)->middleware('auth');


Auth::routes();

Route::get('/home', [EmployeeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/', [EmployeeController::class, 'index'])->name('home');
});
