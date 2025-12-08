{{-- resources/views/admin/users/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen User (Super Admin)') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Pesan sukses / error --}}
            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Role</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-t border-gray-200 dark:border-gray-700">
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>

                                    {{-- FORM UBAH ROLE --}}
                                    <td class="px-4 py-2">
                                        @if (auth()->id() === $user->id)
                                            {{-- Tidak bisa ubah diri sendiri --}}
                                            <span class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700 text-xs">
                                                {{ $user->role }}
                                            </span>
                                        @else
                                            <form action="{{ route('admin.users.updateRole', $user) }}"
                                                  method="POST"
                                                  class="flex items-center gap-2">
                                                @csrf
                                                @method('PATCH')

                                                <select name="role"
                                                        class="border-gray-300 rounded text-xs dark:bg-gray-800">
                                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="super_admin" {{ $user->role === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                                </select>

                                                <button type="submit"
                                                        class="px-2 py-1 text-xs bg-blue-600 hover:bg-blue-700 text-white rounded">
                                                    Simpan
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                    {{-- STATUS BLOKIR --}}
                                    <td class="px-4 py-2">
                                        @if ($user->is_blocked)
                                            <div class="flex flex-col">
                                                <span class="text-red-500 font-semibold">Diblokir</span>
                                                <span class="text-xs text-gray-400">
                                                    Gagal login: {{ $user->failed_login_attempts ?? 0 }}x
                                                </span>
                                            </div>
                                        @else
                                            <div class="flex flex-col">
                                                <span class="text-green-500">Aktif</span>
                                                <span class="text-xs text-gray-400">
                                                    Gagal login: {{ $user->failed_login_attempts ?? 0 }}x
                                                </span>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- AKSI: UNLOCK + HAPUS --}}
                                    <td class="px-4 py-2 space-y-1">
                                        {{-- Tombol UNLOCK hanya kalau diblokir --}}
                                        @if ($user->is_blocked)
                                            <form action="{{ route('admin.users.unlock', $user) }}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="px-2 py-1 text-xs bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                                                    Buka Blokir
                                                </button>
                                            </form>
                                        @endif

                                        {{-- Tombol HAPUS (tidak bisa hapus diri sendiri) --}}
                                        @if (auth()->id() !== $user->id)
                                            <form action="{{ route('admin.users.destroy', $user) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-2 py-1 text-xs bg-red-600 hover:bg-red-700 text-white rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        @else
                                            <div>
                                                <span class="text-xs text-gray-500">
                                                    Tidak bisa hapus diri sendiri
                                                </span>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
