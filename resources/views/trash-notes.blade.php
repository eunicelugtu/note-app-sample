<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRASH NOTES</title>
</head>
<body>
    <h1>Trashed Notes</h1>

    @foreach ($trashednotes as $trashednote)
        <div><b>{{ $trashednote->title ?? 'Untitled' }}</b></div>
        <div><i>{{ $trashednote->description ?? 'no description' }}</i></div>
        <hr>
    @endforeach

</body>
</html>