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

Route::get('/upload', [ArticleController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [ArticleController::class, 'upload'])->name('upload.submit');
Route::get('/download-zip', [ArticleController::class, 'downloadZip'])->name('download.zip');