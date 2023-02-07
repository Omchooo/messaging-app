<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use App\Http\Livewire\Home;
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

// Route::get('/settings2', function () {
//     return view('settings2');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Route::get('/', Home::class)->name('home');

    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');

    // //ProfileController already taken by breeze
    Route::get('/user/{user:username}', [ViewController::class, 'index'])->name('viewprofile.index');

    Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/post', [PostController::class, 'store'])->name('posts.store');
    Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
