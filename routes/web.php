<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', [DashboardController::class, 'index']);

//CRUD User
Route::get('/useradd', [UserController::class, 'useradd']);
Route::post('/userpost', [UserController::class, 'userstore']);

Route::get('/useredit/{id}', [UserController::class, 'useredit']);
Route::put('/userupdate/{id}', [UserController::class, 'userupdate']);

Route::get('/userdelete/{id}', [UserController::class, 'userdelete']);
