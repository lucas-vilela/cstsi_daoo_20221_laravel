<table {{$attributes->merge(['class'=>"table table-$type"])}}>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Importado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $produto)
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
                        <x-button-error>Remover</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
