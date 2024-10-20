<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'showAllNotes'])->name('showAllNotes');

Route::get('/notes/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/notes/save', [NoteController::class, 'saveNote'])->name('saveNote');

Route::get('/notes/{id}', [NoteController::class, 'showNote'])->name('showNote');

Route::get('/notes/{id}/edit', [NoteController::class, 'editNote'])->name('editNote');
Route::put('/notes/{id}/update', [NoteController::class, 'updateNote'])->name('updateNote');

Route::post('/notes/{id}/trash', [NoteController::class, 'trashNote'])->name('trashNote');
Route::get('/notes/trashbin', [NoteController::class, 'showAllTrashed'])->name('showAllTrashed');