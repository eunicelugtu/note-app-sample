<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function showAllNotes()
    {
        $notes = Note::orderBy('updated_at', 'desc')->get();

        return view('notes', ['notes' => $notes]);
    }

    public function createNote()
    {
        return view('create-note');
    }

    public function saveNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:100',
            'content' => 'required|string|max:1000',
        ]);

        $note = new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('showAllNotes')->with('success', 'Note created successfully.');
    }

    public function showNote(Request $request)
    {
        $note = Note::find($request->id);

        if (!$note)
        {
            return redirect()->route('showAllNotes')->with('error', 'Note not found.');
        }

        return view('note', ['note' => $note]);
    }

    public function editNote(Request $request)
    {
        $note = Note::find($request->id);

        if (!$note)
        {
            return redirect()->route('showAllNotes')->with('error', 'Note not found.');
        }

        return view('edit-note', ['note' => $note]);
    }

    public function updateNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:100',
            'content' => 'required|string|max:1000',
        ]);

        $note = Note::find($request->id);
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('showNote', ['id' => $note->id])->with('success', 'Note updated successfully.');
    }

    public function deleteNote(Request $request)
    {
        $note = Note::find($request->id);

        if ($note)
        {
            $note->delete();
        }

        return redirect()->route('showAllNotes')->with('success', 'Note deleted successfully.');
    }
}
