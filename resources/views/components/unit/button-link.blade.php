<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'btn bg-indigo-500 font-medium hover:bg-indigo-600 text-white']) }}>
    {{ $slot }}
</a>
