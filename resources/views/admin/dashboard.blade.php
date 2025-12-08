<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Halo, {{ auth()->user()->name }}!</h3>
                    <p>Ini adalah halaman <strong>Admin Dashboard</strong>.</p>

                    <div class="mt-4 space-x-2">
                        <a href="{{ route('anime.index') }}" class="text-blue-500 underline">
                            Kelola Anime
                        </a>

                        @if(auth()->user()->isSuperAdmin())
                            <a href="{{ route('admin.users.index') }}" class="text-blue-500 underline">
                                Manajemen User
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
