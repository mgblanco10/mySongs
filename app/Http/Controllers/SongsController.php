<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Song;


class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $songs = Song::latest()->paginate(3);
        return view('index',['songs'=>$songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'author'=>'required',
            'title'=>'required',
            'album'=>'required'
        ]);

        Song::create($request->all());
        return redirect()->route('songs.index')->with('success', 'Canción favorita agegada exitosamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song): View
    {
        // dd($song);
        return view('edit',['song' => $song ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song): RedirectResponse
    {
        // dd($request->all());
        $song->update($request->all());
        return redirect()->route('songs.index')->with('success', 'Canción favorita actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song): RedirectResponse
    {
        $song->delete();
        return redirect()->route('songs.index')->with('success', 'Canción favorita eliminada exitosamente!');
    }
}
