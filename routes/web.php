<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MCFController;
use App\Http\Controllers\RRFController;
use App\Http\Controllers\HKSController;
use App\Http\Controllers\CSchoolController;

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
    return view('login');
});
Route::get('/login/', function () {
    return view('login');
});

Route::post('/login/', [UserController::class, 'login'])->name('login');
Route::get('/createuser/', [UserController::class, 'createuser'])->name('createuser');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout/', [UserController::class, 'logout']);
    Route::get('/dash/', function () {
        return view('dash');
    })->name('dash');

    // MCF //
    Route::get('/mcf/', [MCFController::class, 'index'])->name('mcf.index');
    Route::get('/mcf/add/', [MCFController::class, 'create'])->name('mcf.create');
    Route::post('/mcf/add/', [MCFController::class, 'store'])->name('mcf.save');
    Route::get('/mcf/edit/{id}', [MCFController::class, 'edit'])->name('mcf.edit');
    Route::put('/mcf/edit/{id}', [MCFController::class, 'update'])->name('mcf.update');
    Route::delete('/mcf/delete/{id}', [MCFController::class, 'destroy'])->name('mcf.delete');
    Route::get('/mcf/consolidated/', [MCFController::class, 'show'])->name('mcf.show');
    // END MCF //

    // RRF //
    Route::get('/rrf/', [RRFController::class, 'index'])->name('rrf.index');
    Route::get('/rrf/add/', [RRFController::class, 'create'])->name('rrf.create');
    Route::post('/rrf/add/', [RRFController::class, 'store'])->name('rrf.save');
    Route::get('/rrf/edit/{id}', [RRFController::class, 'edit'])->name('rrf.edit');
    Route::put('/rrf/edit/{id}', [RRFController::class, 'update'])->name('rrf.update');
    Route::delete('/rrf/delete/{id}', [RRFController::class, 'destroy'])->name('rrf.delete');
    Route::get('/rrf/consolidated/', [RRFController::class, 'show'])->name('rrf.show');
    // END RRF //

    // HKS //
    Route::get('/hks/', [HKSController::class, 'index'])->name('hks.index');
    Route::get('/hks/add/', [HKSController::class, 'create'])->name('hks.create');
    Route::post('/hks/add/', [HKSController::class, 'store'])->name('hks.save');
    Route::get('/hks/edit/{id}', [HKSController::class, 'edit'])->name('hks.edit');
    Route::put('/hks/edit/{id}', [HKSController::class, 'update'])->name('hks.update');
    Route::delete('/hks/delete/{id}', [HKSController::class, 'destroy'])->name('hks.delete');
    Route::get('/hks/consolidated/', [HKSController::class, 'show'])->name('hks.show');
    // END HKS //

    // C@S //
    Route::get('/cschool/', [CSchoolController::class, 'index'])->name('cschool.index');
    Route::get('/cschool/add/', [CSchoolController::class, 'create'])->name('cschool.create');
    Route::post('/cschool/add/', [CSchoolController::class, 'store'])->name('cschool.save');
    Route::get('/cschool/edit/{id}', [CSchoolController::class, 'edit'])->name('cschool.edit');
    Route::put('/cschool/edit/{id}', [CSchoolController::class, 'update'])->name('cschool.update');
    Route::delete('/cschool/delete/{id}', [CSchoolController::class, 'destroy'])->name('cschool.delete');
    Route::get('/cschool/consolidated/', [CSchoolController::class, 'show'])->name('cschool.show');
    // END C@S //
    
});
