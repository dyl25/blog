<?php

namespace App\Http\Controllers\validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $articles = \App\Article::paginate(10);

        //initialisiation de la localisation pour traduire les dates
        \Carbon\Carbon::setLocale('fr');
        return view('validateur.article.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $article = \App\Article::find($id);

        return view('validateur.article.show', compact('article'));
    }

}
