<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        Oi {{ Auth::user()->name }}, Seja bem-vindo(a) ao site de cadastro de noticias. Fique a vontade!
                        <canvas id="grafico" style="width: 500px; height: 100px"></canvas>
                </div>

            </div>
        </div>
    </div>
    <script>
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafico');

        function gerarListaDeDatas() {
        const listaDeDatas = [];
        const dataAtual = new Date();

        for (let i = 0; i < 7; i++) { // Aqui você define o número de datas que deseja gerar
            const data = new Date(dataAtual);
            data.setDate(data.getDate() - (i * 1)); // Subtrai i semanas da data atual
            listaDeDatas.push(data.toLocaleDateString()); // Adiciona a data formatada na lista
        }

  return listaDeDatas;
}

console.log(...gerarListaDeDatas());

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: [...gerarListaDeDatas()],
            datasets: [{
              label: 'Número de Noticias publicadas por dia',
              data: [1, 2, 3, 4, 5],
              borderWidth: 2
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
</x-app-layout>