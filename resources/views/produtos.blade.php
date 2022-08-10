<x-layouts.app>
    <h1>Produtos</h1>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">
                @if ($produtos->count() > 0)
                    <x-table.products :products="$produtos" type="hover"/>
                @else
                    <p>Produtos não encontrados! </p>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
