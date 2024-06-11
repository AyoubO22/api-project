<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $news = News::orderBy('publish_date', 'desc')->get();
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish_date' => 'required|date'
        ]);

        $news = new News($request->all());

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('news_cover_images', 'public');
            $news->cover_image = $coverImagePath;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News item created successfully.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish_date' => 'required|date'
        ]);

        $news->fill($request->all());

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('news_cover_images', 'public');
            $news->cover_image = $coverImagePath;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News item updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News item deleted successfully.');
    }
}

