<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/news', [PostController::class, 'index'])->name('news');
    Route::get('/news', [PostController::class, 'admin'])->name('news.admin');
    Route::resource('/news', PostController::class);
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [PostController::class, 'admin'])->name('news.admin');
    Route::get('/news/create', [PostController::class, 'create'])->name('news.create');
    Route::get('/news/edit', [PostController::class, 'create'])->name('news.edit');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';