<?php

namespace App\Http\Controllers;
use App\Models\Episode;
use App\Models\Category;



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
        public function create()
        {
        $categories = Category::all();
        return view('episodes.create', ['categories' => $categories]);
        }
        
        public function store(Request $request)
       
{
    $validated = $request->validate([
        'episode_number' => ['required', 'integer'],
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'category_id' => ['required', 'exists:categories,id'],
    ]);

    $validated['user_id'] = auth()->id();

    Episode::create($validated);

    return redirect()->route('episodes.index');
}

 public function edit($id)
{
    $episode = Episode::find($id);
    $categories = Category::all();

    return view('episodes.edit', [
        'episode' => $episode,
        'categories' => $categories,
    ]);
}
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'episode_number' => ['required', 'integer'],
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'category_id' => ['required', 'exists:categories,id'],
    ]);

    $episode = Episode::find($id);
    $episode->update($validated);

    return redirect()->route('episodes.show', $episode->id);
}
public function destroy($id)
{
    $episode = Episode::find($id);
    $episode->delete();

    return redirect()->route('episodes.index');
}
   
}
