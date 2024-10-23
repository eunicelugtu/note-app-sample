<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
</head>
<body>
<div class="note-container">
        <h1>SEARCH RESULTS</h1>

        @if($results->isEmpty())
            <p>No results found.</p><br>

            <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
                <button type="submit" class="btn-view">Back To Notes</button>
            </form>
        @else
            @foreach ($results as $result)
                <div><b>{{ $result->title ?? 'Untitled' }}</b></div>
                <div><i>{{ $result->description ?? 'no description' }}</i></div>

                <br>
                <form action="{{route('showNote', ['id' => $result->id])}}" method="GET" style="display:inline;">
                    <button type="submit" class="btn-view">View</button>
                </form>
                <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
                    <button type="submit" class="btn-view">Back To Notes</button>
                </form>
                <hr>
            @endforeach

        @endif 
    </div>
</body>
</html>