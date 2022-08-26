<div x-data="{ open: false }">

    <table {{ $attributes->merge(['class' => "table table-$type"]) }}>
        <thead>
            <tr>
                <th><a href="#" wire:click="reverter">Id</a></th>
                <th><a href="#" wire:click="orderByName">Nome</a></th>
                <th>Quantidade</th>
                <th><a href="#" wire:click="orderByPrice">Preço</a></th>
                <th>Importado</th>
                <th colspan="2">
                    {{-- <a href="{{route('produto.create')}}"> --}}
                    <x-button @click="open = !open" class="mt-2 ml-3 bg-green-500 hover:bg-green-900 ">
                        Cadastrar
                    </x-button>
                    {{-- </a> --}}
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

    {{-- Exemplo para modal de remoção --}}
    {{-- @foreach ($listProducts as $produto)
        <div x-data="{
                idprod:{{$produto->id}},
                log(){
                    console.log(this.idprod)
                    $wire.set('idprod',this.idprod)
                    $wire.delete()
                },
            }">
        <button x-text="idprod" @click="log()"></button>
        </div>
    @endforeach --}}

     <div x-show="open" x-bind:class="!open ? 'hidden' :
            'overflow-y-auto overflow-x-hidden pl-60 fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray'">
        <div class="flex flex-col w-1/2 pt-10 " @click.away="open = false">
            <x-forms.produto-create/>
        </div>
    </div>
</div>
