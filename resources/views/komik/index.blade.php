<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Komik') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(empty($komik))
                <p class="text-gray-600 dark:text-gray-300">Tidak ada komik ditemukan.</p>
            @else
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($komik as $item)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-3">
                            @if(!empty($item['thumb']))
                                <img src="{{ $item['thumb'] }}"
                                     alt="{{ $item['title'] }}"
                                     class="w-full h-40 object-cover rounded">
                            @endif
                            <h3 class="mt-2 text-sm font-semibold text-gray-800 dark:text-gray-200">
                                {{ $item['title'] }}
                            </h3>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
