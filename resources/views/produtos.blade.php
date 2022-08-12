<x-layouts.app>
    <h1>Produtos</h1>
    @if ($produtos->count() > 0)
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col">
                    <x-table-products>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td><a href="{{ route('show', $produto->id) }}">
                                        {{ $produto->id }}
                                    </a>
                                </td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->qtd_estoque }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>{{ $produto->importado ? 'Sim' : 'Não' }}</td>
                                <td>
                                    <a href="{{ route('edit', $produto->id) }}">
                                        <button class='btn btn-primary btn-sm'>Editar</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete', $produto->id) }}">
                                        <button class='btn btn-danger btn-sm'>Remover</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-table-products>
                </div>
            </div>
        </div>
    @else
        <p>Produtos não encontrados! </p>
    @endif
</x-layouts.app>
