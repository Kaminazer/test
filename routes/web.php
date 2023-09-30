<?php

use App\Http\Controllers\Admin\Post\IndexController as AdminController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', AdminController::class)->middleware('admin')-> name('admin.post.index');
Route::get('/about', [UsersController::class, 'about'])-> name('users.about');
Route::get('/contacts', [UsersController::class, 'contacts'])-> name('users.contacts');

Route::get('/posts', IndexController::class)-> name('posts.index');

Route::get('/posts/create', CreateController::class)-> name('posts.create');
Route::post('/posts', StoreController::class)-> name('posts.store');

Route::get('/posts/{post}', ShowController::class)-> name('posts.show');

Route::get('/posts/{post}/edit', EditController::class)-> name('posts.edit');
Route::patch('/posts/{post}', UpdateController::class)-> name('posts.update');

Route::delete('/posts/{post}', DestroyController::class)-> name('posts.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
