<?php

namespace App\Http\Controllers\News;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    public function index(News $news, Request $request)
    {
        $noticias = News::getNewsUser(Auth::user()->id);

        return view('/News/NewsIndex', compact('noticias'));
    }

    public function store(StorePost $request)
    {

        $image = $request->file('file');
        $imageName = upload($image, 'images');
        dd($image);
        


        try {
            $news = news::create([
                'Titulo' => $request->input('Titulo'),
                'Conteudo' => $request->input('Conteudo'),
                'categoria' => $request->input('selected_category'),
                'id_autor' => Auth::id(),
                'filepold' => $imageName
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }



            

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
