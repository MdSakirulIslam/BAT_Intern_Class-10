<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/product.add',[ProductController::class,'index'])->name('product.add');
Route::POST('/product.add/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product.manage',[ProductController::class,'manage'])->name('product.manage');
Route::get('/product.manage/edit/{id}',[ProductController::class,'edit'])->name('product_manage_edit');
Route::post('/product.update',[ProductController::class,'update'])->name('product.update');
Route::post('/product.delete',[ProductController::class,'delete'])->name('product.delete');
