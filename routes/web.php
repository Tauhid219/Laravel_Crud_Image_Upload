<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class)->names('bo');
Route::resource('product', ProductController::class)->names('pr');
// Route::get('books', [BookController::class, 'index'])->name('book');
