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

        Route::get('/', [App\Http\Controllers\FestivalController::class, 'getFestival'])->name('home');

    });
});
