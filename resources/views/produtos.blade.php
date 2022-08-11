<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2> --}}
        <h1 class='text-4xl'>Produtos no Estoque</h1>
    </x-slot>

    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">
                @if ($produtos->count() > 0)
                    <x-products-table :products="$produtos" type="hover"/>
                @else
                    <p>Produtos não encontrados! </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
