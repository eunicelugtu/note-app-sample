<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;

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
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $note = new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->image = $imagePath;
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

    public function updateNote(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:100',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded
            if ($note->image) {
                Storage::disk('public')->delete($note->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');


        }

        $note = Note::find($request->id);
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->image = $imagePath;
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

    public function searchNote(Request $request)
    {
        $query = $request->input('query');

        $results = Note::where('title', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->orWhere('content', 'LIKE', "%{$query}%")
                        ->get();

        return view('search-results', ['results' => $results]);
    }
}
