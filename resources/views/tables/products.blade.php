<div x-data="{
    open: false,
    idmodal: null
}">
    <table {{ $attributes->merge(['class' => "table table-$type"]) }}>
        <thead>
            <tr>
                <th><a href="#" wire:click="reverter">Id</a></th>
                <th><a href="#" wire:click="orderByName">Nome</a></th>
                <th>Quantidade</th>
                <th><a href="#" wire:click="orderByPrice">Preço</a></th>
                <th>Importado</th>
                <th colspan="2">
                    <x-button x-on:click="open = !open" class="mt-2 ml-3 bg-green-500 hover:bg-green-900 ">
                        Cadastrar
                    </x-button>
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
                        <x-button-error @click=" idmodal = 'modal-rm-{{ $produto->id }}'">
                            Remover
                        </x-button-error>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        @foreach ($listProducts as $produto)
            <div id='modal-rm-{{ $produto->id }}'
                x-show="idmodal == $el.id"
                :class="idmodal == $el.id ? $el.className =
                    'overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full md:h-full' :
                    'hidden'">
                <x-forms.produto-remove :produto="$produto" />
            </div>
        @endforeach
    </div>

    <div x-show="open"
        x-bind:class="!open ? 'hidden' :
            'overflow-y-auto overflow-x-hidden pl-60 fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray'">
        <div class="flex flex-col w-1/2 pt-10 " @click.away="open = false">
            <x-forms.produto-create />
        </div>
    </div>
</div>
