<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // ✅ CRUD cho users (index, show, edit, update, destroy, create, store)
    Route::resource('users', UserController::class);

    // ✅ Route chỉnh sửa profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
});

require __DIR__.'/auth.php';
