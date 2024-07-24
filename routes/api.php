<?php
use App\Http\Controllers\BookController;
use illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);
Route::put('/books/{id}', [BookController::class, 'update']);