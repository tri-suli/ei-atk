<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\ItemTypeController;

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


Route::get('/', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'read']);
Route::get('logout', [LoginController::class, 'destroy']);

Route::get('home', HomeController::class)->name('home');

Route::post('item-types', [ItemTypeController::class, 'store']);
Route::put('item-types/{id}', [ItemTypeController::class, 'update']);
Route::get('item-types', [ItemTypeController::class, 'index'])->name('itypes');

Route::get('items', [ItemController::class, 'index']);
Route::post('items', [ItemController::class, 'store']);
Route::get('items/{id}', [ItemController::class, 'edit']);
Route::put('items/{id}', [ItemController::class, 'update']);
Route::delete('items/{id}', [ItemController::class, 'delete']);
