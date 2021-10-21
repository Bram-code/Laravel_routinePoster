<?php

use Illuminate\Support\Facades\Route;
use \App\http\controllers\AboutController;
use \App\Http\Controllers\RoutineController;
use \App\Http\Controllers\CreateController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\DetailController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/routines', [RoutineController::class, 'index']);
Route::get('/create', [CreateController::class, 'index'])->name('create');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/detail', [DetailController::class, 'index'])->name('detail');

Auth::routes();

Route::post('create',[CreateController::class, 'store']);


