<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
    <title>Notes App</title>
</head>
<body>
    <div class="note-container">
        <h1>Create Note</h1>

        <form action="{{route('saveNote')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="note-container">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="box"><br>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="box"><br>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" id="content" name="content" class="box"><br>
            </div>
            <div id="container">
                <label for="image">Upload Image</label>
                <input type="file" name="image" accept="image/*" class="form-control" class="box">
            </div>

            <br>
            <button type="submit" class="btn-create">Save</button>
            <form action="{{route('showAllNotes')}}" method="GET" style="display:inline;">
                <button type="submit">Back to Notes</button>
            </form>
        </form>
    </div>
</body>
</html>