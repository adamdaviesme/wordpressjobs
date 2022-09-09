<a {{ $attributes->merge(['class' => 'btn-sm px-3 bg-white py-2 shadow border-slate-200 hover:border-slate-300 text-slate-600']) }}
    href="{{ $href }}">
    {{ $slot }}
</a>
