<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
</head>
<body>
    <div class="note-container">
        <h1>Edit Note</h1>

        <form action="{{route('updateNote', ['id' => $note->id])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="note-container">
                <label for="title">Title</label>
                <input value="{{$note->title}}" type="text" id="title" name="title" class="box"><br>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input value="{{$note->description}}" type="text" id="description" name="description" class="box"><br>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input value="{{$note->content}}" type="text" id="content" name="content" class="box"><br>
            </div>
            <div class="note-container">
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="form-control" class="box">
            </div>
            <br>
            <div id="container">
                @if($note->image)
                    <div>
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $note->image) }}" alt="Current Image" style="max-width: 100px;">
                    </div>
                @endif
            </div>

            <br>
            <button type="submit" class="btn-edit">Update</button>
        </form>
        <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
                <button type="submit" class="btn-view">Back to Notes</button>
        </form>
    </div>
</body>
</html>