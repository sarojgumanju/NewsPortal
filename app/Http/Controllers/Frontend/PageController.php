<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where("status", true)->get();
        view()->share([
            "categories" => $categories
        ]);
    }

    public function home(){
        $latest_article = Article::latest()->first();
        return view('frontend.home', compact('latest_article'));
    }

    public function about(){
        
        return view('frontend.about');
    }
}
