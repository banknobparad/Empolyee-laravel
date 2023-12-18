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

Route::get('/', [App\Http\Controllers\UserController::class,'show' ])->name('home');

Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');

Route::get('/showcreate', [App\Http\Controllers\UserController::class, 'showcreate'])->name('showcreate');

Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');


