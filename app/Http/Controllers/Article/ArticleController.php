<?php

namespace App\Http\Controllers\Article;

use Carbon\Carbon;
use App\Models\Article;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function getArticleCategories()
    {
        $categories = DB::table('article_categories')
            ->select([
                'id',
                'name',
                'description',
                DB::raw('(SELECT COUNT(*) FROM articles WHERE articles.category_id = article_categories.id) as article_count')
            ])
            ->get();

        return response()->json($categories);
    }

    public function getChoosenArticle()
    {
        $articles = DB::table('articles')
            ->leftJoin('users', 'articles.author_id', '=', 'users.id')
            ->leftJoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select([
                'articles.title',
                'articles.slug',
                'articles.thumbnail',
                'articles.content',
                DB::raw('DATE_FORMAT(articles.created_at, "%d %b %Y") as created_at'),
                DB::raw('COALESCE(users.name, "anonymous") as author_name'),
                DB::raw('COALESCE(article_categories.name, "anonymous") as category_name'),
            ])
            ->where('articles.is_choosen', true)
            ->get();

        return response()->json($articles);
    }

    public function getNewestArticle()
    {
        $article = DB::table('articles')
            ->leftJoin('users', 'articles.author_id', '=', 'users.id')
            ->leftJoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select([
                'articles.title',
                'articles.slug',
                'articles.thumbnail',
                'articles.content',
                DB::raw('DATE_FORMAT(articles.created_at, "%d %b %Y") as created_at'),
                DB::raw('COALESCE(users.name, "anonymous") as author_name'),
                DB::raw('COALESCE(article_categories.name, "anonymous") as category_name'),
            ])
            ->latest()
            ->first();

        if (!$article) {
            return response()->json(['message' => 'Tidak ada Artikel'], 404);
        }

        return response()->json($article);
    }

    public function searchArticle(Request $request)
    {
        $searchTerm = $request->input('search', '');
        // dd($searchTerm);
        $articles = DB::table('articles')
            ->leftJoin('users', 'articles.author_id', '=', 'users.id')
            ->leftJoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select([
                'articles.title',
                'articles.slug',
                'articles.thumbnail',
                'articles.content',
                DB::raw('DATE_FORMAT(articles.created_at, "%d %b %Y") as created_at'),
                DB::raw('COALESCE(users.name, "anonymous") as author_name'),
                DB::raw('COALESCE(article_categories.name, "anonymous") as category_name'),
            ])
            ->where('articles.title', 'like', '%' . $searchTerm . '%')
            // ->orWhere('articles.content', 'like', '%' . $searchTerm . '%')
            ->get();

        return response()->json([
            'latest_articles' => $articles
        ]);
    }

    public function getArticleBySlug($slug)
    {
        $decodedSlug = urldecode($slug);

        $article = DB::table('articles')
            ->leftJoin('users', 'articles.author_id', '=', 'users.id')
            ->leftJoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select([
                // 'articles.slug',
                'articles.title',
                'articles.thumbnail',
                'articles.content',
                DB::raw('DATE_FORMAT(articles.created_at, "%d %b %Y") as created_at'),
                DB::raw('COALESCE(users.name, "anonymous") as author_name'),
                DB::raw('COALESCE(users.avatar, "default-avatar.png") as author_avatar'),
                DB::raw('COALESCE(article_categories.name, "anonymous") as category_name'),
            ])
            ->where('articles.slug', $decodedSlug)
            ->first();

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        $recommendArticles = DB::table('articles')
            ->leftJoin('users', 'articles.author_id', '=', 'users.id')
            ->leftJoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select([
                'articles.title',
                'articles.slug',
                'articles.thumbnail',
                'articles.content',
                DB::raw('DATE_FORMAT(articles.created_at, "%d %b %Y") as created_at'),
                DB::raw('COALESCE(users.avatar, "default-avatar.png") as author_avatar'),
                DB::raw('COALESCE(users.name, "anonymous") as author_name'),
                DB::raw('COALESCE(article_categories.name, "anonymous") as category_name'),
            ])
            ->where('articles.slug', '!=', $decodedSlug)
            ->latest()
            ->limit(3)
            ->get();


        $data = [
            'recommend_articles' => $recommendArticles->toArray(),
            'detail_articles' => $article,
        ];

        // dd($data);

        return view('article-detail', ['dataJson' => json_encode($data)]);
    }
}
