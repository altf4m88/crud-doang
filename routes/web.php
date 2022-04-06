<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
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
Route::get('/', [DashboardController::class, 'index']);
Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'store']);
Route::get('/print/{id}', [RegistrationController::class, 'print']);

//to do: add middleware
Route::group(['middleware' => ['auth']], function(){
    Route::get('/registration-report', [RegistrationController::class, 'report']);
    Route::get('/registration-detail', [RegistrationController::class, 'detail']);
    Route::patch('/registration', [RegistrationController::class, 'update']);
    Route::delete('/registration', [RegistrationController::class, 'delete']);
});
