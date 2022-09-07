<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MCFController;

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
    
});
