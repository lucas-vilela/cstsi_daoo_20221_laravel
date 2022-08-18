<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border border-btn-error bg-red-600 hover:bg-btn-error active:bg-red-500 text-white rounded-md px-2 py-1 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
