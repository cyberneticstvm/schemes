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

    Route::get('/mcf/update/', [MCFController::class, 'index'])->name('mcf.update');
    Route::post('/mcf/update/', [MCFController::class, 'update'])->name('mcf.update');
});
