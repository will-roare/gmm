<?php

namespace App\Http\Controllers;
use App\Models\Episode;


use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {
        $episodes = Episode::all();
        return view('episodes.index', ['episodes' => $episodes]);
    }
    public function show($id)
    {
        $episode = Episode::find($id);
        return view('episodes.show', ['episode' => $episode]);
    }
}

