<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
</head>
<body>
    <h1>Create Note</h1>

    <form action="{{route('saveNote')}}" method="POST">
        @method('POST')
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title"><br>
        <label for="description">Description</label>
        <input type="text" id="description" name="description"><br>
        <label for="content">Content</label>
        <input type="text" id="content" name="content"><br>

        <br>
        <button type="submit">Save</button>
    </form>

    <form action="{{route('showAllNotes')}}" method="GET">
        <button type="submit">Back to Notes</button>
    </form>
    
</body>
</html>