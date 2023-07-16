<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;

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

Route::get('/news/create/form', [NewsController::class, 'createForm']);
Route::post('/news/create', [NewsController::class, 'create'])->name('create-news');
Route::get('/news/list', [NewsController::class, 'getList']);
Route::get('/news/{id}', [NewsController::class, 'getNewsInfo']);
Route::post('/comment/rating/{id}/{rate}', [CommentController::class, 'setRate']);
