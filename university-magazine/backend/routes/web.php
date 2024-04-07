<?php

use App\Mail\RegisterMail;
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
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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


Route::post('/article/toggle-selected/{article}', [ArticleController::class, 'toggleSelected'])->name('article.toggleSelected');

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
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/submit-contributions', [UserController::class, 'submitContributions']);
    Route::get('/contribution-newsfeed', [UserController::class, 'contributionNewsfeed']);
    Route::get('/student-mail', [UserController::class, 'studentMail']);
    Route::get('/student-profile', [UserController::class, 'studentProfile']);


    Route::get('/article-detail/{article}', [ArticleController::class, 'articleDetail']);

    Route::post('/article/{article}/comments', [CommentController::class, 'store']);
    Route::delete('/article/comment/delete/{comment}', [CommentController::class, 'delete']);


    Route::get('/article/{article}/edit', [ArticleController::class, 'edit']);
    Route::patch('/article/{article}/update', [ArticleController::class, 'update']);
    Route::patch('/student/{profile}/update', [UserController::class, 'profileUpdate']);

    Route::get('/mc/article/{article}/edit', [ArticleController::class, 'mcEdit']);
    Route::get('/mc/article-detail/{article}', [ArticleController::class, 'mcArticleDetail']);
    Route::patch('/mc/article/{article}/update', [ArticleController::class, 'update']);
    Route::get('/coordinator-mail', [UserController::class, 'coordinatorMail']);
    Route::get('/guest-list', [UserController::class, 'showGuest']);
    Route::get('/coordinator-profile', [UserController::class, 'studentProfile']);

    Route::get('/manager-profile', [UserController::class, 'studentProfile']);

    Route::get('/guest-profile', [UserController::class, 'studentProfile']);
    Route::get('/admin-profile', [UserController::class, 'studentProfile']);
    Route::patch('/guest/{profile}/update', [UserController::class, 'guestProfileUpdate']);



    Route::post('/upload', [ArticleController::class, 'upload']);


    Route::get('/download-articles', [ArticleController::class, 'downloadArticlesZip']);


    Route::get('/user-list', function () {
        return view('frontend/Admin/user-list');
    });
    Route::get('/magazine', function () {
        return view('frontend/Admin/magazine');
    });

    Route::get('/magazine-profile/{magazine}', [MagazineController::class, 'profile']);
    Route::patch('/magazine-profile/{magazine}/update', [MagazineController::class, 'profileUpdate']);
    Route::delete('/magazine/{magazine}/destroy', [MagazineController::class, 'destroyMagazine']);




    Route::get('/user-enroll', function () {
        return view('frontend/Admin/user-enroll');
    });

    Route::get('/user-profile/{user}',  [UserController::class, 'userProfile']);
    Route::delete('/user/{user}/destroy', [UserController::class, 'destroyUser']);
    Route::patch('/user/{user}/update', [UserController::class, 'adminProfileUpdate']);
    Route::post('/submit-form', [UserController::class, 'register']);

    Route::post('/magazine/store', [MagazineController::class, 'store']);
});


Route::post('/submit-form/guest', [UserController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'apiLogin']);
Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);
Route::middleware('guest')->group(function () {
});


Route::get('/upload-success', function () {
    return view('upload-success');
})->name('upload.success');

Route::get('/', function () {
});