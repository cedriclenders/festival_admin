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


Auth::routes();



Route::get('/likes', [App\Http\Controllers\PerformanceController::class, 'getLikes']);
Route::get('/festivals', [App\Http\Controllers\FestivalController::class, 'getAll']);
Route::post('description', [App\Http\Controllers\FestivalController::class, 'updateInfo'])->name('festivalInfoUpdate');
Route::post('update-stage', [App\Http\Controllers\StageController::class, 'update'])->name('stageUpdate');
Route::get('/likes', [App\Http\Controllers\PerformanceController::class, 'getLikes']);
Route::post('update-performance', [App\Http\Controllers\PerformanceController::class, 'update'])->name('performanceUpdate');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:Admin']], function () {
        //
        Route::get('/admins-list', function()
        {
            return view('admins-list');
        });

        Route::get('/users-list', function()
        {
            return view('users-list');
        });

        Route::get('/performances', [App\Http\Controllers\PerformanceController::class, 'getAll']);
        Route::get('/stages', [App\Http\Controllers\StageController::class, 'getAll']);
        Route::get('/performance/{id}', [App\Http\Controllers\PerformanceController::class, 'get']);
        Route::get('/stage/{id}', [App\Http\Controllers\StageController::class, 'get']);

        Route::get('/stage-add', function()
        {
            return view('stage-add');
        });
        
        Route::get('/performance-add', function()
        {
            return view('performance-add');
        });
        
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    });
});
