<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Noticias Publicadas') }}
        </h2>
    </x-slot>
    <form action="{{route('store.news')}}" method="POST">
        @csrf
    
    
        @php
            echo $errors->any()
        @endphp
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <x-input-label for="Titulo" :value="__('Título')" />
                            <x-text-input id="Titulo" class="block mt-1 w-full" type="text" name="Titulo" :value="old('Titulo')" required autofocus autocomplete="Titulo" />
                            <x-input-error :messages="$errors->get('Titulo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="Conteudo" :value="__('Conteúdo')" />
                            <x-text-area id="Conteudo" class="block mt-1 w-full" type="text" name="Conteudo" :value="old('Conteudo')" required autofocus autocomplete="Conteudo" />
                        </div>
                        <div>
                            <x-input-label for="Categorias" :value="__('Escolha a categoria desta noticia')" />
                            <x-category-card id="Categorias" name="Categoria" :categories="['Política', 'Esportes', 'Tecnologia', 'Entretenimento', 'Saúde']" selected />
                        </div>
                        <div hidden>
                            <x-input-label for="autor" :value="__('Autor')" />
                            <x-text-input id="Autor" class="block mt-1 w-full" type="text" name="autor" :value="Auth::user()->name" required autofocus readonly autocomplete="autor" />
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Enviar') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>