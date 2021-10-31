<?php

use Illuminate\Support\Facades\Route;
use \App\http\controllers\AboutController;
use \App\Http\Controllers\RoutineController;
use \App\Http\Controllers\CreateController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\DetailController;
use \App\Http\Controllers\ViewController;
use \App\Http\Controllers\EditController;
use \App\Http\Controllers\DeleteController;
use \App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index']);
Route::get('/admin', [RoutineController::class, 'index'])->name('admin');
Route::get('/create', [CreateController::class, 'index'])->name('create');
Route::get('/edit/{id}', [EditController::class, 'index'])->name('edit');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::get('/view', [ViewController::class, 'index'])->name('view');
Route::get('/delete/{id}', [DeleteController::class, 'index'])->name('delete');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Auth::routes();

Route::post('create', [CreateController::class, 'store']);
Route::post('edit/{id}', [EditController::class, 'update']);
Route::post('delete/{id}', [DeleteController::class, 'delete']);
Route::post('admin', [RoutineController::class, 'switch']);
Route::post('like/{id}', [DetailController::class, 'like']);
Route::post('nolike/{id}', [DetailController::class, 'nolike']);
Route::post('profile', [ProfileController::class, 'change']);






