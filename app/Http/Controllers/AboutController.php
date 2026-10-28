<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About";
        $nama = "Rizqi Handoyo Nitimulyo";
        $hobby = "Nonton Anime/Youtube, Bermain Game, Mendengarkan musik";
        $repository = "https://github.com/MerisHandoyo";

        return view('admin.about', compact('title', 'nama', 'hobby', 'repository'));
    }
}
