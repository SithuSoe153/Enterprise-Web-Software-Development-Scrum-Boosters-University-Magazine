<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;

// Route::get('/upload', [ArticleController::class, 'showUploadForm'])->name('upload.form');
// Route::post('/upload', [ArticleController::class, 'upload'])->name('upload.submit');


// Route::get('/download-articles', [ArticleController::class, 'downloadArticlesZip'])->name('articles.download.zip');
// Route::get('/da', [ArticleController::class, 'downloadArticlesZip'])->name('articles.download.zip');



Route::middleware('auth-user')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [AuthController::class, 'dashboard']);

    Route::post('/upload', [ArticleController::class, 'upload']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'apiLogin']);

    Route::post('/register', [AuthController::class, 'store']);
});


Route::get('/upload-success', function () {
    return view('upload-success');
})->name('upload.success');

Route::get('/', function () {
    return view('welcome');
});
