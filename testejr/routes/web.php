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


    Route::get('noticias', [NewsController::class, 'index'])->name('verNoticias');

    Route::get('cadastro', function() {
        return view('/News/newnoticia');
    })->name('cadastro.noticias');

    Route::post('NoticiasCadastro', [NewsController::class, 'store'])->name('store.news');

    Route::get('NoticiasVer', function() {
        return view('/News/showNoticia');
    })->name('view');

    Route::get('NoticiasVer/{news}', [NewsController::class, 'show'])->name('view.news');

    Route::get('NoticiasAtualizar', function() {
        return view('/News/editNoticia');
    })->name('update');

    Route::get('NoticiasAtualizar/{news}', [NewsController::class, 'update'])->name('update.news');

    Route::get('NoticiasApagar/{news}', [NewsController::class, 'destroy'])->name('destroy.name');
});

require base_path('routes/auth.php');