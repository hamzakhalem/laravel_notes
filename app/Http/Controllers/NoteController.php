<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //
        $title = 'ALl Notes';
        // $notes = Note::all(); 
        // $notes = Note::where('user_id', auth()->id())->get(); 
        $notes = Note::whereUserId(auth()->id())->latest()->paginate(5);
        return view('notes.index', compact('notes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Create title';
        return view('notes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255|unique:notes',
            'body' => 'required|string|min:10'
        ]);

        $request->user()->notes()->create($validated);
        return redirect(route('notes.index'))->with('success', 'Note Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        // 
        $title = 'Note';
        return view('notes.show', compact('note','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
        $this->authorize('update', $note);
        $title = 'Edit Note';
        return view('notes.edit', compact('note','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
        $this->authorize('update', $note);
        $validated = $request->validate([
            'title' => ['required','string','min:5','max:255',Rule::unique('notes')->ignore($note->id)],
            'body' => 'required|string|min:10'
        ]);

        $note->update($validated);
        return redirect(route('notes.index'))->with('success', 'Note Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        $this->authorize('delete', $note);
        $note->delete();
        return redirect(route('notes.index'))->with('success', 'Note Deleted');
    }
}
