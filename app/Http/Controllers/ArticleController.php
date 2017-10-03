<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = \App\Article::latest()->take(6)->get();
        //dd($articles);
        \Carbon\Carbon::setLocale('fr');
        return view('article.index', compact('articles'));
    }
    
    public function all() {
        $articles = \App\Article::paginate(6);
        \Carbon\Carbon::setLocale('fr');
        return view('article.all', compact('articles'));
    }
    
    public function search(Request $request) {

        $articles = \App\Article::searchByTitle($request['article'])->paginate(6);
        
        return view('article.all', compact('articles'));
    }
}
