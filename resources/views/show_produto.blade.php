<x-app-layout>
    @vite('resources/css/show-prod.css')
    <x-slot name="header">
        <h1 class='text-4xl'>
            <h1>{{ $produto ? $produto->nome : 'Detalhes do Produto' }}</h1>
        </h1>
    </x-slot>
    <div class="container text-center">
        @if ($produto)
            <div class="row align-items-center">
                <div class="col">
                    <h2 class='text-center  fw-bolder'>Descrição:</h2>
                    <p>
                        {{ $produto->descricao }}
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 offset-md-3 align-self-center">
                    <table class='table'>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Preço</th>
                                <td>{{ number_format($produto->preco, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Quantidade</th>
                                <td>{{ $produto->qtd_estoque }}</td>
                            </tr>
                            <tr>
                                <th>Importado</th>
                                <td>{{ $produto->importado ? 'Sim' : 'Não' }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="row align-items-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <p>Produto não encontrado! </p>
        @endif
        <a href="/produto"><button type="button" class="btn btn-primary">
                Voltar
            </button>
        </a>
</x-app-layout>
