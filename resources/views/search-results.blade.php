<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
</head>
<body>
    <h1>SEARCH RESULTS</h1>

    @if($results->isEmpty())
        <p>No results found.</p><br>

        <form action="{{route('showAllNotes')}}" method="GET">
            <button type="submit">Back To Notes</button>
        </form>
    @else
        @foreach ($results as $result)
            <div><b>{{ $result->title ?? 'Untitled' }}</b></div>
            <div><i>{{ $result->description ?? 'no description' }}</i></div>

            <br>
            <form action="{{route('showNote', ['id' => $result->id])}}" method="GET">
                <button type="submit">View</button>
            </form>
            <hr>
        @endforeach
    @endif
    
</body>
</html>