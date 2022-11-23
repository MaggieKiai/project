<?php

use Modules\Dean\Http\Controllers\DeanController;
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

Route::prefix('dean')->group(function() {
//    Route::get('/', 'DeanController@index');
    Route::group(['middleware' => 'dean'], function (){
        Route::get('/dean', [DeanController::class, 'index'])->name('dean.dashboard');
        Route::get('/applications', [DeanController::class, 'applications'])->name('dean.applications');
        Route::get('/viewApplication/{id}', [DeanController::class, 'viewApplication'])->name('dean.viewApplication');
        Route::get('/previewApplication/{id}', [DeanController::class, 'previewApplication'])->name('dean.previewApplication');
        Route::get('/batch', [DeanController::class, 'batch'])->name('dean.batch');
        Route::post('/batchSubmit', [DeanController::class, 'batchSubmit'])->name('dean.batchSubmit');
        Route::get('/acceptApplication/{id}', [DeanController::class, 'acceptApplication'])->name('dean.acceptApplication');
        Route::post('/rejectApplication/{id}', [DeanController::class, 'rejectApplication'])->name('dean.rejectApplication');

        Route::get('/transfer', [DeanController::class, 'transfer'])->name('dean.transfer');
        Route::get('/batchTransfer', [DeanController::class, 'batchTransfer'])->name('dean.batchTransfer');
        Route::get('/viewTransfer/{id}', [DeanController::class, 'viewTransfer'])->name('dean.viewTransfer');
        Route::get('/preview/{id}', [DeanController::class, 'preview'])->name('dean.preview');
        Route::post('/rejectTransfer/{id}', [DeanController::class, 'rejectTransfer'])->name('dean.rejectTransfer');
        Route::get('/acceptTransfer/{id}', [DeanController::class, 'acceptTransfer'])->name('dean.acceptTransfer');

    });
});
