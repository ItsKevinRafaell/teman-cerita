<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class GuestController extends Controller
{
    public function home()
    {
        $articles = Article::latest()->limit(4)->get();
        $articlesArray = $articles->toArray(); // Convert collection to array
        return view('home', ['articlesJson' => json_encode($articlesArray)]);
    }


    public function article()
    {
        return view('article');
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
