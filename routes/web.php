<?php

use App\Http\Controllers\CreatePostController;
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

Route::get('/', [CreatePostController::class, 'index']);

Route::post('/create', [CreatePostController::class, 'store'])->name('create');
Route::delete('users/{id}', [CreatePostController::class, 'destroy'])->name('delete');
Route::post('/edit/{id}', [CreatePostController::class, 'edit'])->name('edit');
//Route::post('/create', [CreatePostController::class, 'store'])->name('create');
// Route::get('/read/{id}', 'CreatePostController')->name('read');
// Route::post('/update/{id}', 'CreatePostController')->name('update');
// Route::delete('/delete/{id}', 'CreatePostController')->name('delete');

