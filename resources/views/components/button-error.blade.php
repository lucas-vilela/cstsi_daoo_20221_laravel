<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border border-btn-error bg-btn-error hover:bg-red-700 active:bg-red-900 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
