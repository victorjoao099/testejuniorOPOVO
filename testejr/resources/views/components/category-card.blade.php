<!-- resources/views/components/category-card.blade.php -->
@props(['categories' => []])

<div {{ $attributes->merge(['class' => 'border border-gray-300 rounded-lg shadow-md p-4 dark:bg-gray-800 dark:border-gray-600']) }}>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Escolha a Categoria da Notícia</h2>

    <!-- Campo oculto para armazenar a categoria selecionada -->
    <input type="hidden" name="selected_category" id="selected_category">

    <div class="grid grid-cols-2 gap-4">
        @foreach($categories as $category)
            <button 
                type="button" 
                class="category-btn w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400"
                onclick="selectCategory('{{ $category }}', this)"
            >
                {{ $category }}
            </button>
        @endforeach
    </div>
</div>

<script>
    function selectCategory(category, button) {
        // Atualiza o campo oculto com a categoria selecionada
        document.getElementById('selected_category').value = category;

        // Remove a classe 'selected' de todos os botões
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.classList.remove('bg-blue-700', 'text-white', 'border');
            btn.classList.add('bg-blue-500');
        });

        // Adiciona a classe 'selected' ao botão clicado
        button.classList.remove('bg-blue-500');
        button.classList.add('bg-blue-700', 'border');
    }
</script>
