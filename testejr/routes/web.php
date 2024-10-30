<?php

use App\Http\Controllers\funcionario;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    //Área para a criação, edição e destruição de contas
    Route::get('/profile', [funcionario::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [funcionario::class, 'update'])->name('profile.update');
    Route::delete('/profile', [funcionario::class, 'destroy'])->name('profile.destroy');
});

require base_path('routes/auth.php');