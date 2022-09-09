<label {{ $attributes->merge(['class' => 'block font-semibold mb-2']) }}>
    <div class="flex flex-row items-end">
        <span>
            {{ $slot }}
        </span>
        @if (isset($error))
            <span class="text-rose-500 font-semibold ml-2 text-sm">{{ $error }}</span>
        @endif
    </div>
    @if (isset($labelDescription))
        <span class="block mt-1 text-sm font-normal">{{ $labelDescription }}</span>
    @endif
</label>
