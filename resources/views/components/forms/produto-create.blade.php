<div class=" w-fit h-auto m-2 p-3 drop-shadow-2xl bg-white self-center rounded-md pt-6">
    <h1 class="text-xl">Cadastrar Novo Produto</h1>
    <div x-data="{
        nome:'',
        descricao:'',
        quantidade:0,
        preco:0,
        importado:false,
        save(){
            $wire.set('nome', this.nome)
            $wire.set('descricao', this.descricao)
            $wire.set('quantidade', this.quantidade)
            $wire.set('preco', this.preco)
            $wire.set('importado', this.importado)
            $wire.save();
        }
    }">
    {{-- <form wire:submit.prevent="save" > --}}
    <form @submit.prevent="save()" id="produto-create">
    @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"/> -->
        <table>
            <tr>
                <td>Nome:</td>
                <td><input x-model="nome" type="text" name="nome" /></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td>
                    <textarea x-model="descricao" name="descricao" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Quantidade em Estoque:</td>
                <td><input x-model="quantidade" type="text" name="qtd_estoque" /></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input x-model="preco" type="number" name="preco" /></td>
            </tr>
            <tr>
                <td>Importado:</td>
                <td><input x-model="importado" type="checkbox" name="importado" /></td>
            </tr>
        </table>

    <table>
        <tr align="center">
            <td>
                <button @click="open=false" class='btn btn-danger'>
                    Cancelar
                </button>
            </td>
            <td>
                <button form="produto-create" @click="open=false" class='btn btn-success bg-green-600'>
                    Criar
                </button>
            </td>
        </tr>
    </table>
</form>
</div>

</div>
