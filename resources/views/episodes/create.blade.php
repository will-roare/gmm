<h1>Add an episode</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('episodes.store') }}">
    @csrf

    <p>
        <label>Episode number</label><br>
        <input type="number" name="episode_number" value="{{ old('episode_number') }}">
    </p>

    <p>
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
    </p>

    <p>
        <label>Category</label><br>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </p>

    <button type="submit">Save episode</button>
</form>