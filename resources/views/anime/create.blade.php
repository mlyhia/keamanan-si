<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Anime</h1>

        <form action="{{ route('anime.store') }}" method="POST">
            @csrf

            <label>Judul</label>
            <input type="text" name="judul" class="w-full border p-2 mb-3">

            <label>Genre</label>
            <input type="text" name="genre" class="w-full border p-2 mb-3">

            <label>Jumlah Episode</label>
            <input type="number" name="jumlah_episode" class="w-full border p-2 mb-3">

            <label>Rating</label>
            <input type="number" name="rating" step="0.1" class="w-full border p-2 mb-3">

            <label>Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 mb-3"></textarea>

            <button class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
