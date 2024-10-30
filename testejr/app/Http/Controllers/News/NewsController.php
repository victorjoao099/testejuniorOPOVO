<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $noticias = news::orderbyDesc('id')->get();

        return view('noticias', ['noticias' => $noticias]);
    }

    public function store(StorePost $request)
    {

        $news = news::create([
            'Titulo' => $request->titulo,
            'Conteudo' => $request->conteudo,
            'Categoria' => $request->categoria,
            'Autor' => Auth::user()->name,
        ]);

        return redirect()->to('noticias');
    }

    public function show(news $news)
    {
        return view('show', ['news' => $news]);
    }

    public function update(StorePost $request, news $news)
    {
        $request->validated();

        $news->update([
            'Titulo' => $request->titulo,
            'Conteudo' => $request->conteudo,
        ]);

        return redirect()->route('showNews', ['news' => $news->id])->with('success', 'Noticia editada com sucesso');
    }

    public function destroy(news $news)
    {
        $news->delete();

        return redirect()->route('noticias')->with('success', 'Noticia Apaga com sucesso');
    }
}
