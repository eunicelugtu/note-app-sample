<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
</head>
<body>
    <h1>Current Note</h1>

    <div><h2>{{ $note->title ?? 'Untitled' }}</h2></div>
    <div><i>{{ $note->description ?? 'no description' }}</i></div><br>
    <div>{{$note->content ?? ''}}</div>

    @if($note->image)
            <img src="{{ asset('storage/' . $note->image) }}" alt="Note Image" style="max-width: 300px;">
    @endif

    <div><p><strong>Last Updated:</strong> {{ $note->updated_at->diffForHumans() }}</p></div>

    <br>
    <form action="{{route('editNote', ['id' => $note->id])}}" method="GET">
            <button type="submit">Edit</button>
        </form>
        <form action="{{route('deleteNote', ['id' => $note->id])}}" method="POST"
        onsubmit="return confirm('Are you sure?')">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
    <form action="{{route('showAllNotes')}}" method="GET">
        <button type="submit">Back to Notes</button>
    </form>
    
</body>
</html>