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
use Illuminate\Support\Facades\DB;

// Route::get('/upload', [ArticleController::class, 'showUploadForm'])->name('upload.form');
// Route::post('/upload', [ArticleController::class, 'upload'])->name('upload.submit');


// Route::get('/download-articles', [ArticleController::class, 'downloadArticlesZip'])->name('articles.download.zip');
// Route::get('/da', [ArticleController::class, 'downloadArticlesZip'])->name('articles.download.zip');


// Route::get('/storage/articles/user13_20240302200449/{filename}', function ($filename) {
//     dd(file_get_contents($filename));
//     // Construct the file path
//     $filePath = storage_path('app/public/articles/' . $filename . '.docx');

//     // Load the Word document
//     $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath);

//     // Save the Word document as PDF
//     $pdfPath = storage_path('app/public/articles/' . $filename . '.pdf');
//     $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
//     $pdfWriter->save($pdfPath);

//     // Return the PDF file as response
//     return response()->file($pdfPath);
// })->name('view.word');

Route::get('/test-db', function () {
    // dd(request()->header('User-Agent'));

    try {
        DB::connection()->getPdo();
        return 'Connected successfully to the PostgreSQL database.';
    } catch (\Exception $e) {
        return 'Could not connect to the PostgreSQL database. Error: ' . $e->getMessage();
    }
});

Route::middleware('auth-user')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/da', [ArticleController::class, 'downloadArticlesZip']);

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