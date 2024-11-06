<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Noticias Publicadas') }}
        </h2>
    </x-slot>
    <form action="{{route('update.news', ['news' => $news->id])}}" method="POST">
        @csrf
        @Method('PUT')
    
        @php
            echo $errors->any()
        @endphp

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <x-input-label for="Titulo" :value="__('Título')" />
                            <x-text-input id="Titulo" class="block mt-1 w-full" type="text" name="Titulo" :value="old('Titulo', $news->Titulo)" required autofocus autocomplete="Titulo" />
                            <x-input-error :messages="$errors->get('Titulo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="Conteudo" :value="__('Conteúdo')" />
                            <x-text-area id="Conteudo" class="block mt-1 w-full" type="text" name="Conteudo" :value="old('Conteudo', $news->Conteudo)" required autofocus autocomplete="Conteudo" />
                        </div>
                        <div hidden>
                            <x-input-label for="Categorias" :value="__('Escolha a categoria desta noticia')" />
                            <x-text-input id="Categorias" class="block mt-1 w-full" type="text" name="categoria" :value="old('Categorias', $news->categoria)" required autofocus readonly autocomplete="categorias" selected />
                        </div>
                        <div hidden>
                            <x-input-label for="autor" :value="__('Autor')" />
                            <x-text-input id="Autor" class="block mt-1 w-full" type="text" name="autor" :value="old('autor', $news->autor)" required autofocus readonly autocomplete="autor" />
                        </div>
                        <x-primary-button class="mt-4">
                            Atualizar Noticia
                        </x-primary-button>
                </form>

                        <form action="{{route('delete.news', ['news' => $news->id])}}" method="POST">
                            @csrf
                            @method('delete')    
                                <x-primary-button class="mt-4">
                                    Excluir Noticia
                                </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>