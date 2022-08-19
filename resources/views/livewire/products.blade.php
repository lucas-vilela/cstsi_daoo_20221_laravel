<div class="container text-center">
    <div class="row align-items-center">
        <div class="col">
            @if ($produtos->count() > 0)
                <x-products-table :listProducts="$produtos" type="striped"/>
            @else
                <p>Produtos não encontrados! </p>
            @endif
        </div>
    </div>
</div>
