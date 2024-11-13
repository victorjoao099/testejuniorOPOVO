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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        // const ctx = document.getElementById('grafico');

        function gerarListaDeDatas() {
        const listaDeDatas = [];
        const dataAtual = new Date();

        for (let i = 14; i >= 0; i--) { 
            const data = new Date(dataAtual);
            data.setDate(data.getDate() - (i * 1));
            listaDeDatas.push(data.toLocaleDateString());
        }

  return listaDeDatas;

}
$.ajax({
  url: '/details/adicoesPorDia',
  type: 'GET',
  success: function(response) {
    // Estrutura de dados para o gráfico
    const labels = Object.keys(response); // as datas (chaves)
    const data = Object.values(response);  // as contagens (valores)
    
    console.log(data)
    // Criar o gráfico com os dados
    const ctx = document.getElementById('grafico');
    const myChart = new Chart(ctx, {
      type: 'line',  // tipo do gráfico (pode ser 'bar' para barras)
      data: {
        labels: [...gerarListaDeDatas()],  // labels no eixo X (datas)
        datasets: [{
          label: 'Número de noticias postadas por dia',
          data: data,  // valores das adições por dia
          fill: true,  // não preencher área sob a linha
          borderColor: 'rgba(75, 192, 192, 1)',  // cor da linha
          tension: 0.1   // suavização da linha
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            title: {
              display: true,
              text: 'Datas'
            }
          },
          y: {
            title: {
              display: true,
              text: 'Número de Noticias Postadas'
            },
            beginAtZero: true  // faz o gráfico começar no 0
          }
        }
      }
                });
              },
              error: function(xhr) {
                console.error('Erro ao buscar dados para o gráfico');
              }
            });
            </script>
</x-app-layout>