<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::resource('users', UserController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', 'App\Http\Controllers\ProductController');

Route::resource('categories', 'App\Http\Controllers\CategoryController');

Route::resource('profomas', 'App\Http\Controllers\InvoiceProformaController');

Route::resource('notes', 'App\Http\Controllers\NotesProformaController');
