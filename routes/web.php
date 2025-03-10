<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'] )->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/blog', [PostController::class, 'index'] )->name('blog');
Route::get('/post/create', [PostController::class, 'create'] )->middleware(['auth', 'verified'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'] )->middleware(['auth', 'verified']);
Route::get('/post/{slug}', [PostController::class, 'show'] )->name('post.show');;
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('post.edit');
Route::patch('/post/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.delete');
Route::get('/update-slugs', [PostController::class, 'update_slugs'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/about', 'about')->name('about');

Route::get('/contact', [ContactController::class, 'edit'] )->name('contact');
Route::post('/contact', [ContactController::class, 'store'] );



Route::middleware('auth')->group(function () {
    Route::get('/setting', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::patch('/setting', [SettingController::class, 'update'])->name('admin.setting.update');
});


require __DIR__.'/auth.php';
