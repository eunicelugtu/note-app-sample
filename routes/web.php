<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes/search', [NoteController::class, 'searchNote'])->name('searchNote');

Route::get('/notes', [NoteController::class, 'showAllNotes'])->name('showAllNotes');

Route::get('/notes/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/notes/save', [NoteController::class, 'saveNote'])->name('saveNote');

Route::get('/notes/{id}', [NoteController::class, 'showNote'])->name('showNote');

Route::get('/notes/{id}/edit', [NoteController::class, 'editNote'])->name('editNote');
Route::put('/notes/{id}/update', [NoteController::class, 'updateNote'])->name('updateNote');

Route::delete('/notes/{id}/delete', [NoteController::class, 'deleteNote'])->name('deleteNote');