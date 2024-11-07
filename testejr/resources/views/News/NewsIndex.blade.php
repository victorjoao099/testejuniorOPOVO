<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Noticias Publicadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse ($noticias as $news)
                    <x-terciary-buttom   class="mt-4">
                        <a href="{{route('update', ['news' => $news->id])}}">Editar</a>
                    </x-primary-button>
                    <x-primary-button class="mt-4">
                        <a href="{{route('view.news', ['news' => $news->id])}}">Visualizar</a>
                    </x-primary-button> <br>    
                        Titulo: {{ $news->Titulo }}<br>
                        Conteúdo: {{ $news->Conteudo }}<br>
                        Categoria: {{ $news->categoria }}<br>
                        Autor: {{ $news->autor }}<br>
                        Data: {{ \Carbon\Carbon::parse($news->publicado_em)->tz('America/Sao_Paulo')->format('d/m/Y') }}<br>
        <hr>

    @empty
        <span style="color: #f00;">Nenhuma noticia encontrada!</span>
    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>