<?php

use App\Http\Controllers\details;
use App\Http\Controllers\funcionario;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\ProfileController;
use App\Models\news;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [details::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/details/adicoesPorDia', [details::class, 'adicoesPorDia'])->name('adicoesPorDia');
    //Área para a criação, edição e destruição de contas
    Route::get('/profile', [funcionario::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [funcionario::class, 'update'])->name('profile.update');
    Route::delete('/profile', [funcionario::class, 'destroy'])->name('profile.destroy');


    Route::get('noticias', [NewsController::class, 'index'])->name('verNoticias');

    Route::get('cadastro', function() {
        return view('/News/newnoticia');
    })->name('cadastro.noticias');

    Route::post('NoticiasCadastro', [NewsController::class, 'store'])->name('store.news');

    Route::get('NoticiasVer', function(news $news) {
        return view('/News/showNoticia', ['news' => $news]);
    })->name('view');

    Route::get('NoticiasVer/{news}', [NewsController::class, 'show'])->name('view.news');

    Route::get('/NoticiasEditar/{news}', function(news $news) {
        return view('/News/editNoticia', ['news' => $news]);
    })->name('update');

    Route::put('NoticiasAtualizar/{news}', [NewsController::class, 'update'])->name('update.news');

    Route::delete('NoticiasApagar/{news}', [NewsController::class, 'destroy'])->name('delete.news');
});

require base_path('routes/auth.php');