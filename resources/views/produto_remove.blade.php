<x-layouts.app>
    @if ($produto)
        <h1>{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <ul>
            <li>Quantidade: {{ $produto->qtd_estoque }}</li>
            <li>Preço: {{ $produto->preco }}</li>
            <li>Importado: {{ $produto->importado ? 'Sim' : 'Não' }}</li>
        </ul>
        <form id='remove' action="{{route('remove',$produto->id)}}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <input type="hidden" name='id' value="{{$produto->id}}" />
        </form>
        <table>
            <tr align="center">
                <td>
                    <a href="/produtos"><button class='btn btn-info'>Cancelar</button></a>
                </td>
                <td >
                    <input form="remove" type="submit" class='btn btn-danger' name='confirmar' value="Deletar"/>
                </td>
            </tr>
        </table>
    @else
        <p>Produtos não encontrados! </p>
        <a href="/produtos">&#9664;Voltar</a>
    @endif
    @if(isset($msg))
    <p>{{$msg}}</p>
    @endif
</x-layouts.app>
