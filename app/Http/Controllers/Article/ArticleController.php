<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails');

        Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => Auth::id(),
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailPath = $article->thumbnail;

        if ($thumbnailPath) {
            Storage::delete($thumbnailPath);
        }

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails');

        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => Auth::id(),
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // Delete the thumbnail if it exists
        if ($article->thumbnail) {
            Storage::delete($article->thumbnail);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
