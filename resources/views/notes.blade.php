<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
</head>
<body>
    <h1>Notes</h1>

    <form action="{{ route('searchNote') }}" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <form action="{{route('createNote')}}" method="GET">
        <button type="submit">Add Note</button>
    </form>
    <br>

    <br>

    @foreach ($notes as $note)
        <div><b>{{ $note->title ?? 'Untitled' }}</b></div>
        <div><i>{{ $note->description ?? 'no description' }}</i></div>

        <br>
        <form action="{{route('showNote', ['id' => $note->id])}}" method="GET">
            <button type="submit">View</button>
        </form>
        <form action="{{route('editNote', ['id' => $note->id])}}" method="GET">
            <button type="submit">Edit</button>
        </form>
        <form action="{{route('deleteNote', ['id' => $note->id])}}" method="POST"
        onsubmit="return confirm('Are you sure?')">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
        <hr>
    @endforeach
    
</body>
</html>