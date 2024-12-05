<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Noticias Publicadas') }}
        </h2>
    </x-slot>
    <form action="{{route('store.news')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="image">
                                <input type="file" name="filepond" class="filepond" id="image" type="image" accept=".jpeg, .png, .jpg, .gif" multiple data-max-file-size="3MB"
                                data-max-files="3">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script>
        /*
 * jQuery FilePond 1.0.0
 * Licensed under MIT, https://opensource.org/licenses/MIT
 * Please visit https://pqina.nl/filepond for details.
 */
(function ($, FilePond) {
    'use strict';

    // No jQuery No Go
    if (!$ || !FilePond) {
        return;
    }

    // Test if FilePond is supported
    if (!FilePond.supported()) {
        // add stub
        $.fn.filepond = function () { };
        return;
    }

    // Helpers
    function argsToArray(args) {
        return Array.prototype.slice.call(args);
    }

    function isFactory(args) {
        return !args.length || typeof args[0] === 'object';
    }

    function isGetter(obj, key) {
        var descriptor = Object.getOwnPropertyDescriptor(obj, key);
        return descriptor ? typeof descriptor.get !== 'undefined' : false;
    }

    function isSetter(obj, key) {
        var descriptor = Object.getOwnPropertyDescriptor(obj, key);
        return descriptor ? typeof descriptor.set !== 'undefined' : false;
    }

    function isMethod(obj, key) {
        return typeof obj[key] === 'function';
    }

    // Setup plugin
    $.fn.filepond = function () {

        // get arguments as array
        var args = argsToArray(arguments);

        // method results array
        var results = [];

        // Execute for every item in the list
        var items = this.each(function () {

            // test if is create call
            if (isFactory(args)) {
                FilePond.create(this, args[0])
                return;
            }

            // get a reference to the pond instance based on the element
            var pond = FilePond.find(this);

            // if no pond found, exit here
            if (!pond) {
                return;
            }

            // get property name or method name
            var key = args[0];

            // get params to pass
            var params = args.concat().slice(1);

            // run method
            if (isMethod(pond, key)) {
                results.push(pond[key].apply(pond, params));
                return;
            }

            // set setter
            if (isSetter(pond, key) && params.length) {
                pond[key] = params[0];
                return;
            }

            // get getter
            if (isGetter(pond, key)) {
                results.push(pond[key]);
                return;
            }

            console.warn('$().filepond("' + key + '") is an unknown property or method.');
        });

        // returns a jQuery object if no results returned
        return results.length ? this.length === 1 ? results[0] : results : items;
    };

    // Static API
    Object.keys(FilePond).forEach(function (key) {
        $.fn.filepond[key] = FilePond[key];
    });

    // Redirect setDefaults to setOptions
    $.fn.filepond.setDefaults = FilePond.setOptions;

}(jQuery, FilePond));
    </script>
</x-app-layout>
