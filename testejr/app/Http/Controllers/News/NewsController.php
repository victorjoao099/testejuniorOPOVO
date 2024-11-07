<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\funcionario;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(News $news, Request $request)
    {
        // $id = $news->id_autor;

        // $user = User::find($id);

        // $nome = $user->name;

        // $name = collect($nome);

        $noticias = News::getNewsUser(Auth::user()->id);

        return view('/News/NewsIndex', compact('noticias'));
    }

    public function store(StorePost $request, funcionario $funcionario)
    {
            // dd(Auth::id());
            $news = news::create([
                'Titulo' => $request->input('Titulo'),
                'Conteudo' => $request->input('Conteudo'),
                'categoria' => $request->input('selected_category'),
                'id_autor' => Auth::id(),
            ]);
            

        return redirect()->route('verNoticias');
    }

    public function show(News $news, Request $request)
    {

        // dd($news->Titulo);
        $id = $news->id_autor;

        $user = User::find($id);

        $nome = $user->name;

        $name = collect($nome);
        // dd($nome);
        return view('/News/showNoticia',['name' => $name], ['news' => $news], ['request' => $request]);
    }

    public function update(StorePost $request, News $news)
    {

        $request->validated();

        $news->update([
            'Titulo' => $request->Titulo,
            'Conteudo' => $request->Conteudo,
        ]);

        return redirect()->route('verNoticias', ['news' => $news->id])->with('success', 'Noticia editada com sucesso');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('verNoticias')->with('success', 'Noticia Apaga com sucesso');
    }
}
