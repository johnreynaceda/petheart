<div class="ml-4">
    <h1 class="uppercase text-gray-700 font-semibold">{{ $getRecord()->name }}</h1>
    @if (request()->routeIs('admin.inventory'))
        <span class="text-sm text-red-600 leading-3">({{ number_format($getRecord()->price, 2) }}
            {{ $getRecord()->label_per_stock }}/{{ $getRecord()->stock_as_whole }})</span>
    @else
        <span class="text-sm leading-3">({{ $getRecord()->serial_code }})</span>
    @endif
</div>
