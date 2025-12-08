<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('anime.index', compact('animes'));
    }

    public function create()
    {
        return view('anime.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'jumlah_episode' => 'required|integer',
            'rating' => 'nullable|numeric',
            'deskripsi' => 'nullable',
        ]);

        Anime::create($request->all());

        return redirect()->route('anime.index')->with('success', 'Anime berhasil ditambahkan!');
    }

    public function edit(Anime $anime)
    {
        return view('anime.edit', compact('anime'));
    }

    public function update(Request $request, Anime $anime)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'jumlah_episode' => 'required|integer',
            'rating' => 'nullable|numeric',
            'deskripsi' => 'nullable',
        ]);

        $anime->update($request->all());

        return redirect()->route('anime.index')->with('success', 'Anime berhasil diperbarui!');
    }

    public function destroy(Anime $anime)
    {
        $anime->delete();
        return redirect()->route('anime.index')->with('success', 'Anime berhasil dihapus!');
    }
}
