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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'cotizaciones'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change', [App\Http\Controllers\ChangeController::class, 'index'])->name('change');
Route::post('/change/update', [App\Http\Controllers\ChangeController::class, 'calculate'])->name('change.update');
Route::get('/home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('product.create');
Route::post('/home/save', [App\Http\Controllers\HomeController::class, 'save'])->name('product.save');
Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('product.edit');
Route::post('/home/update', [App\Http\Controllers\HomeController::class, 'update'])->name('product.update');
Route::get('/home/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('product.delete');
Route::get('/home/price/{id}', [App\Http\Controllers\HomeController::class, 'price'])->name('product.price');
Route::get('/home/blue/{id}', [App\Http\Controllers\HomeController::class, 'priceBlue'])->name('product.blue');




