<table {{$attributes->merge(['class'=>"table table-$type"])}}>
    <thead>
        <tr>
            <th><a href="#" wire:click="reverter">Id</a></th>
            <th><a href="#" wire:click="orderByName">Nome</a></th>
            <th>Quantidade</th>
            <th><a href="#" wire:click="orderByPrice">Preço</a></th>
            <th>Importado</th>
            <th colspan="2">
                <a href="{{route('produto.create')}}">
                    <x-button class="my-2 ml-3 bg-green-500 hover:bg-green-900">
                        Criar Novo Produto
                    </x-button>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listProducts as $produto)
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
                        <x-button-error>Remover</x-button-error>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
