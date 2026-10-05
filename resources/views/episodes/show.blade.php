<h1>{{ $episode->title }}</h1>
<p>{{ $episode->description }}</p>
<p>Author: {{ $episode->author->name }}</p>
<p>Category: {{ $episode->category->name }}</p>
<a href="{{ route('episodes.edit', $episode->id) }}">Edit</a>

<form method="POST" action="{{ route('episodes.destroy', $episode->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete episode</button>
</form>