<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl">Inserir Produto</h1>
    </x-slot>

    <div class="flex flex-col items-center">
        <div class="m-10 p-3 shadow-lg self-center flex flex-col items-center bg-white rounded-md pt-6 w-4/5">
            <form id="create" action="/produto" method="POST">
                @csrf
                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
                <table>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="nome" /></td>
                    </tr>
                    <tr>
                        <td>Descricao:</td>
                        <td>
                            <textarea name="descricao" id="" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Quantidade em Estoque:</td>
                        <td><input type="text" name="qtd_estoque" /></td>
                    </tr>
                    <tr>
                        <td>Preço:</td>
                        <td><input type="number" name="preco" /></td>
                    </tr>
                    <tr>
                        <td>Importado:</td>
                        <td><input type="checkbox" name="importado" /></td>
                    </tr>
                </table>
            </form>
            <table>
                <tr align="center">
                    <td>
                        <a href="/produtos"><button class='btn btn-danger'>Cancelar</button></a>
                    </td>
                    <td>
                        <input form="create" type="submit" class='btn btn-success bg-green-600' name='confirmar' value="Criar" />
                    </td>
                </tr>
            </table>
        </div>
    </div>

    @if (isset($msg))
        <p>{{ $msg }}</p>
    @endif
</x-app-layout>
