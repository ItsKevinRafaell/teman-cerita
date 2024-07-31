<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class GuestController extends Controller
{
    public function home()
    {
        $articles = Article::latest()
            // ->limit(4)
            ->get()
            ->map(function ($article) {
                return [
                    'slug' => $article->slug,
                    'title' => $article->title,
                    'thumbnail' => $article->thumbnail,
                    'content' => $article->content,
                    'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
                    // 'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),
                    // 'author_name' => $article->author ? $article->author->name : null,
                    // 'category_name' => $article->category ? $article->category->name : null,
                ];
            });
        $articlesArray = $articles->toArray();
        return view('home', ['dataJson' => json_encode($articlesArray)]);
    }


    public function article()
    {
        $articles = Article::with(['author', 'category'])
            ->latest()
            ->limit(4)
            ->get()
            ->map(function ($article) {
                return [
                    'slug' => $article->slug,
                    'title' => $article->title,
                    'thumbnail' => $article->thumbnail,
                    'content' => $article->content,
                    'created_at' => Carbon::parse($article->created_at)->format('d M Y'),
                    // 'updated_at' => Carbon::parse($article->updated_at)->format('d M Y'),

                    'author_name' => $article->author ? $article->author->name : null,
                    'category_name' => $article->category ? $article->category->name : null,
                ];
            });

        $chosenCategories = ArticleCategory::withCount('articles')
            ->orderBy('articles_count', 'desc')
            // ->limit(3)
            ->get()
            ->map(function ($chosenCategory) {
                return [
                    'id' => $chosenCategory->id,
                    'count' => $chosenCategory->articles_count,
                    'name' => $chosenCategory->name,
                ];
            });

        $chosenArticles = Article::where('is_choosen', true)
            ->get()
            ->map(function ($chosenArticle) {
                return [ 
                    'title' => $chosenArticle->title,
                    'slug' => $chosenArticle->slug,
                    'thumbnail' => $chosenArticle->thumbnail,
                    'content' => $chosenArticle->content,
                ];
            });

        $totalArticlesCount = Article::count();

        $data = [
            'latest_articles' => $articles->toArray(),
            'chosen_categories' => $chosenCategories->toArray(),
            'chosen_articles' => $chosenArticles->toArray(),
            'total_articles_count' => $totalArticlesCount,
        ];

        // Kirim data dalam bentuk JSON ke view
        return view('article', ['dataJson' => json_encode($data)]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
