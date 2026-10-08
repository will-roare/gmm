<h1>Edit episode</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('episodes.update', $episode->id) }}">
    @csrf
    @method('PUT')

    <p>
        <label>Episode number</label><br>
        <input type="number" name="episode_number" value="{{ old('episode_number', $episode->episode_number) }}">
    </p>

    <p>
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title', $episode->title) }}">
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ old('description', $episode->description) }}</textarea>
    </p>

    <p>
        <label>Category</label><br>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $episode->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </p>

    <button type="submit">Update episode</button>
</form>
<p><a href="{{ route('episodes.index') }}">Back to all episodes</a></p>