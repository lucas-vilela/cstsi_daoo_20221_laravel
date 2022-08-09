<x-layouts.app>
    <h1>Atualizar Produto</h1>
    <form id='update' action="{{route('update',$produto->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$produto->nome}}"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><textarea name="descricao" id="" cols="30" rows="10">{{$produto->descricao}}</textarea></td>
            </tr>
            <tr>
                <td>Quantidade em Estoque:</td>
                <td><input type="text" name="qtd_estoque" value="{{$produto->qtd_estoque}}"/></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input type="number" name="preco" value="{{$produto->preco}}"/></td>
            </tr>
            <tr>
                <td>Importado:</td>
                <td><input type="checkbox" name="importado" {{($produto->importado)?'checked':''}}/></td>
            </tr>
        </table>
    </form>
    <table>
        <tr align="center">
            <td>
                <a href="/produtos"><button class='btn btn-danger'>Cancelar</button></a>
            </td>
            <td >
                <input form="update" type="submit" class='btn btn-success' name='confirmar' value="Atualizar"/>
            </td>
        </tr>
    </table>
    @if(isset($msg))
    <p>{{$msg}}</p>
    @endif
</x-layouts.app>
