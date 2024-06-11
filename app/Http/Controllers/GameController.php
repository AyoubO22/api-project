<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games; // Ensure this matches your model namespace and name

class GameController extends Controller
{
    public function index()
    {
        $games = Games::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Genre' => 'required',
            'Platform' => 'required',
            'Developer' => 'required',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $game = new Games([
            'Title' => $request->get('Title'),
            'Genre' => $request->get('Genre'),
            'Platform' => $request->get('Platform'),
            'Developer' => $request->get('Developer'),
            'Image' => $request->file('Image')->store('images', 'public'),
        ]);
        $game->save();

        return redirect('/games')->with('success', 'Game has been added');
    }

    public function show(Games $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Games $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Games $game)
    {
        $request->validate([
            'Title' => 'required',
            'Genre' => 'required',
            'Platform' => 'required',
            'Developer' => 'required',
            'Image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $game->Title = $request->get('Title');
        $game->Genre = $request->get('Genre');
        $game->Platform = $request->get('Platform');
        $game->Developer = $request->get('Developer');

        if ($request->hasFile('Image')) {
            $game->Image = $request->file('Image')->store('images', 'public');
        }

        $game->save();

        return redirect('/games')->with('success', 'Game has been updated');
    }

    public function destroy(Games $game)
    {
        $game->delete();

        return redirect('/games')->with('success', 'Game has been deleted');
    }
}
