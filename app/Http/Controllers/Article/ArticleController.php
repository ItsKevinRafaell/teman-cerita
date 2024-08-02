<?php

namespace App\Http\Controllers\Article;

use Carbon\Carbon;
use App\Models\Article;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function getArticleCategories()
    {
        $categories = ArticleCategory::all()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description,
                    'article_count' => $category->articles_count,
                ];
            });

        return response()->json($categories);
    }

    public function getChoosenArticle()
    {
        $articles = Article::where('is_choosen', true)
            ->with(['author', 'category'])
            ->get()
            ->map(function ($article) {
                return [
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'thumbnail' => $article->thumbnail,
                    'content' => $article->content,
                    'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
                    // 'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),
                    'author_name' => $article->author ? $article->author->name : null,
                    'category_name' => $article->category ? $article->category->name : null,
                ];
            });

        return response()->json($articles);
    }

    public function getNewestArticle()
    {
        $article = Article::latest()->first();

        if (!$article) {
            return response()->json(['message' => 'Tidak ada Artikel'], 404);
        }

        $articleData = [
            'title' => $article->title,
            'slug' => $article->slug,
            'thumbnail' => $article->thumbnail,
            'content' => $article->content,
            'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
            // 'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),
            'author_name' => $article->author ? $article->author->name : null,
            'category_name' => $article->category ? $article->category->name : null,
        ];

        return response()->json($articleData);
    }

    public function searchArticle(Request $request)
    {
        $searchTerm = $request->input('search', '');

        $articles = Article::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('content', 'like', '%' . $searchTerm . '%')
            ->with(['author', 'category'])
            ->get()
            ->map(function ($article) {
                return [
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'thumbnail' => $article->thumbnail,
                    'content' => $article->content,
                    'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
                    // 'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),
                    'author_name' => $article->author ? $article->author->name : null,
                    'category_name' => $article->category ? $article->category->name : null,
                ];
            });

        return response()->json($articles);
    }

    // public function getArticleDetail($id)
    // {
    //     $article = Article::with(['author', 'category'])->find($id);

    //     if (!$article) {
    //         return response()->json(['message' => 'Article not found'], 404);
    //     }

    //     $articleData = [
    //         'title' => $article->title,
    //         'thumbnail' => $article->thumbnail,
    //         'content' => $article->content,
    //         'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
    //         // 'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),
    //         'author_name' => $article->author ? $article->author->name : null,
    //         'author_avatar' => $article->author ? $article->author->avatar : null,
    //         'category_name' => $article->category ? $article->category->name : null,
    //     ];

    //     return response()->json($articleData);
    //     // return view('article-detail', ['articleData' => $articleData]);
    // }

    public function getArticleDetail($slug)
    {
        $decodedSlug = urldecode($slug);

        $article = Article::with(['author', 'category'])
            ->where('slug', $decodedSlug)
            ->first();

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        $articleData = [
            'title' => $article->title,
            'slug' => $article->slug,
            'thumbnail' => $article->thumbnail,
            'content' => $article->content,
            'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
            'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),
            'author_name' => $article->author ? $article->author->name : null,
            'author_avatar' => $article->author ? $article->author->avatar : null,
            'category_name' => $article->category ? $article->category->name : null,
        ];

        $recommendArticles = Article::with(['author', 'category'])
            ->where('slug', '!=', $decodedSlug)
            ->latest()
            ->limit(3)
            ->get()
            ->map(function ($recommendArticle) {
                return [
                    'title' => $recommendArticle->title,
                    'slug' => $recommendArticle->slug,
                    'thumbnail' => $recommendArticle->thumbnail,
                    'content' => $recommendArticle->content,
                    'created_at' => Carbon::parse($recommendArticle->created_at)->format('d M Y'),
                    // 'updated_at' => Carbon::parse($recommendArticle->updated_at)->format('d M Y'),
                    'author_avatar' => $recommendArticle->author ? $recommendArticle->author->avatar : null,
                    'author_name' => $recommendArticle->author ? $recommendArticle->author->name : null,
                    'category_name' => $recommendArticle->category ? $recommendArticle->category->name : null,
                ];
            });


        $data = [
            'recommend_articles' => $recommendArticles->toArray(),
            'detail_articles' => $articleData,
        ];

        return view('article-detail', ['dataJson' => json_encode($data)]); 
        // return response()->json($data);
    }
}
