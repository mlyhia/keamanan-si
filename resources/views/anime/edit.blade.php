<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Anime</h1>

        <form action="{{ route('anime.update', $anime) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul</label>
            <input type="text" name="judul" value="{{ $anime->judul }}" class="w-full border p-2 mb-3">

            <label>Genre</label>
            <input type="text" name="genre" value="{{ $anime->genre }}" class="w-full border p-2 mb-3">

            <label>Jumlah Episode</label>
            <input type="number" name="jumlah_episode" value="{{ $anime->jumlah_episode }}" class="w-full border p-2 mb-3">

            <label>Rating</label>
            <input type="number" name="rating" step="0.1" value="{{ $anime->rating }}" class="w-full border p-2 mb-3">

            <label>Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 mb-3">{{ $anime->deskripsi }}</textarea>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </form>
    </div>
</x-app-layout>
