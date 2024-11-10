<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EditProfile;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post/{postID}', [PostController::class, 'single'])->middleware(['auth', 'verified'])->name('single.post');

Route::get('/messages/{userID}', [MessageController::class, 'index'])->middleware(['auth', 'verified'])->name('messages');

Route::get('profile/edit', EditProfile::class)->name('profile.edit');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


require __DIR__ . '/auth.php';
