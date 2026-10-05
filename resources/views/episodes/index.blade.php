<h1>Episodes</h1>

<p><a href="{{ route('episodes.create') }}">New episode</a></p>
@foreach ($episodes as $episode)
<p><a href="{{ route('episodes.show', $episode->id) }}">{{ $episode->title }}</a></p>
@endforeach