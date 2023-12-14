<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\UserController::class,'index'])->name('home');

Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::get('/showcreate', [App\Http\Controllers\UserController::class, 'showcreate'])->name('showcreate');
