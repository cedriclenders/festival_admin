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


Auth::routes(['register' => false]);





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
        Route::get('/genres', [App\Http\Controllers\GenreController::class, 'getAll']);
        Route::get('/stages', [App\Http\Controllers\StageController::class, 'getAll']);
        Route::get('/markers', [App\Http\Controllers\MarkerController::class, 'getAll']);
        Route::get('/markers-data', [App\Http\Controllers\MarkerController::class, 'getAllJson']);
        Route::get('/marker-add', function()
        {
            return view('marker-add');
        });
        Route::post('/store-marker', [App\Http\Controllers\MarkerController::class, 'add'])->name('storeMarker');
        Route::get('/performance/{id}', [App\Http\Controllers\PerformanceController::class, 'get']);
        Route::get('/stage/{id}', [App\Http\Controllers\StageController::class, 'get']);

        Route::get('/stage-delete/{id}', [App\Http\Controllers\StageController::class, 'delete']);
        Route::get('/performance-delete/{id}', [App\Http\Controllers\PerformanceController::class, 'delete']);

        Route::get('/stage-add', function()
        {
            return view('stage-add');
        });
        
        Route::get('/performance-add', function()
        {
            return view('performance-add');
        });
        
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::post('/update-festival', [App\Http\Controllers\FestivalController::class, 'updateInfo'])->name('festivalInfoUpdate');

        Route::post('/add-genre', [App\Http\Controllers\GenreController::class, 'add'])->name('addGenre');
        

        Route::post('save-festival-image', [App\Http\Controllers\UploadImageController::class, 'saveFestivalImage']);
        Route::post('save-performer-image/{performance}', [App\Http\Controllers\UploadImageController::class, 'savePerformerImage']);
        Route::post('save-app-image', [App\Http\Controllers\UploadImageController::class, 'saveAppImage']);
        Route::get('delete-image/{id}', [App\Http\Controllers\UploadImageController::class, 'delete']);
        Route::post('update-stage', [App\Http\Controllers\StageController::class, 'update'])->name('stageUpdate');
        Route::post('update-performance', [App\Http\Controllers\PerformanceController::class, 'update'])->name('performanceUpdate');
        Route::get('/make-admin/{id}', [App\Http\Controllers\UserController::class, 'upgrade']);
        Route::get('/make-user/{id}', [App\Http\Controllers\UserController::class, 'downgrade']);
        
        Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'getAll']);
        Route::get('/faq-add', function()
        {
            return view('faq-add');
        });
        Route::post('update-faq', [App\Http\Controllers\FaqController::class, 'update'])->name('faqUpdate');
        Route::get('/faq/{id}', [App\Http\Controllers\FaqController::class, 'get']);
        Route::get('/faq-delete/{id}', [App\Http\Controllers\FaqController::class, 'delete']);


    });
});
