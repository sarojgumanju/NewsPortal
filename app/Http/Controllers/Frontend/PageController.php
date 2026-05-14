<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
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

    public function category($slug){
        // return $slug;
        $category = Category::where("slug", $slug)->first();
        $advertises = Advertise::where('expire_date', ">=", today())->get();
        $articles = $category->articles()->latest()->paginate(2)->get();
        return view('frontend.category', compact('category', 'advertises', 'articles'));
    }

    public function search(Request $req){
        //return $req;
        $q = $req->q;
        $articles = Article::where('title', 'like', "%$q%")->orWhere('description', 'like', "%$q%")->latest()->get(); // auuta matra search result chaiyou vaney get lekhney
        //$articles = Article::where('title', 'like', '%$q%')->first();
        $advertises = Advertise::where('expire_date', '>=', today())->get();
        return view('frontend.search', compact('articles', 'advertises', 'q'));
    }

    public function article($slug){
        //return $slug;
        $article = Article::where('slug', $slug)->first();
        $advertises = Advertise::where('expire_date', '>=', today())->get();
        return view('frontend.article', compact('article', 'advertises'));

    }

}
