<div class="flex flex-col w-full h-full">
    <div  class="flex flex-col justify-center w-5/6 shadow bg-white dark:bg-gray-700 h-auto mt-3 p-2 self-center rounded-md">
        @if ($produtos->count() > 0)
            <x-products-table :listProducts="$produtos" type="striped" />
        @else
            <p>Produtos não encontrados! </p>
        @endif
    </div>
</div>
