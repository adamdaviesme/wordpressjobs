<button {{ $attributes->merge(['class' => 'text-sm font-bold text-indigo-500 hover:text-indigo-600']) }} type="button">
    {{ $slot }}
</button>
