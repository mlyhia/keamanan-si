<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Anime</h1>

        <a href="{{ route('anime.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Anime</a>

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Genre</th>
                    <th class="p-2 border">Episode</th>
                    <th class="p-2 border">Rating</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animes as $anime)
                <tr>
                    <td class="p-2 border">{{ $anime->judul }}</td>
                    <td class="p-2 border">{{ $anime->genre }}</td>
                    <td class="p-2 border">{{ $anime->jumlah_episode }}</td>
                    <td class="p-2 border">{{ $anime->rating }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('anime.edit', $anime) }}" class="text-blue-600">Edit</a>

                        <form action="{{ route('anime.destroy', $anime) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ml-2">Hapus</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
