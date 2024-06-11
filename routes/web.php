<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactReplyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PosedQuestionController;


Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');
Route::resource('news', NewsController::class);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactFormController::class, 'submitForm'])->name('contact.submit');

Route::post('/contact-reply', [ContactReplyController::class, 'store'])->name('contact-reply.store');

Route::middleware(['auth'])->group(function () {
    Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/contact-submissions', [ContactFormController::class, 'listSubmissions'])->name('contact.submissions');
    Route::post('/admin/contact-submissions/{id}/reply', [ContactFormController::class, 'replyToSubmission'])->name('contact.reply');
});

Route::post('/faq/pose', [PosedQuestionController::class, 'store'])->name('faq.pose');
Route::get('/admin/posed-questions', [PosedQuestionController::class, 'index'])->name('admin.posed-questions.index');
Route::post('/admin/posed-questions/{posedQuestion}/answer', [PosedQuestionController::class, 'answer'])->name('admin.posed-questions.answer');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ .'/auth.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




