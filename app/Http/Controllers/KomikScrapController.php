<?php

namespace App\Http\Controllers;

class KomikScrapController extends Controller
{
    public function index()
    {
        // Data komik dummy (seolah-olah hasil scraping)
        $komik = [
            [
                'title' => 'Mirai Nikki',
                'thumb' => asset('komik/poster-mirai-nikki.jpg'),
            ],
            [
                'title' => 'Attack On Titan',
                'thumb' => asset('komik/poster-aot.jpg'),
            ],
        ];

        return view('komik.index', compact('komik'));
    }

    public function show($slug)
    {
        // Belum dipakai, jadi sementara 404
        abort(404);
    }
}
