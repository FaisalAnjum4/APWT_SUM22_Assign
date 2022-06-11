<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
Route::get('/',[CustomerController::class,'home'])->name('homepge');
Route::get('/create',[CustomerController::class,'create'])->name('customercreate');
Route::post('/create',[CustomerController::class,'createSubmit'])->name('customercreate.submit');
Route::get('/login',[CustomerController::class,'login'])->name('customerlogin');
Route::post('/login',[CustomerController::class,'loginvalidate'])->name('customerlogin.submit');
Route::get('/all',[CustomerController::class,'list'])->name('userlist');
Route::get('/all/details',[CustomerController::class,'details'])->name('userdetails');