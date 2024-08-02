<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{

    public function home()
    {
        $articles = DB::table('articles')
            ->select([
                'slug',
                'title',
                'thumbnail',
                'content',
                DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at')
            ])
            ->latest()
            ->limit(4)
            ->get();

        $articlesArray = $articles->toArray();
        return view('home', ['dataJson' => json_encode($articlesArray)]);
    }

    public function article()
    {
        $articles = DB::table('articles')
            ->select([
                'articles.slug',
                'articles.title',
                'articles.thumbnail',
                'articles.content',
                DB::raw('DATE_FORMAT(articles.created_at, "%d %b %Y") as created_at'),
                'users.name as author_name',
                'article_categories.name as category_name'
            ])
            ->join('users as users', 'articles.author_id', '=', 'users.id')
            ->join('article_categories as article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->latest()
            ->limit(4)
            ->get();

        $chosenCategories = DB::table('article_categories')
            ->select([
                'article_categories.id',
                'article_categories.name',
                DB::raw('COUNT(articles.id) as count')
            ])
            ->leftJoin('articles', 'article_categories.id', '=', 'articles.category_id')
            ->groupBy('article_categories.id', 'article_categories.name')
            ->orderBy('count', 'desc')
            ->get();

        $chosenArticles = DB::table('articles')
            ->select([
                'title',
                'slug',
                'thumbnail',
                'content'
            ])
            ->where('is_choosen', true)
            ->get();

        $totalArticlesCount = DB::table('articles')->count();

        $data = [
            'latest_articles' => $articles->toArray(),
            'chosen_categories' => $chosenCategories->toArray(),
            'chosen_articles' => $chosenArticles->toArray(),
            'total_articles_count' => $totalArticlesCount,
        ];

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
