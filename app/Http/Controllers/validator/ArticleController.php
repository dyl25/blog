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
    
    public function toValidate() {
        $article = new \App\Article();
        $articles = $article->toValidate();

        return view('validator.article.toValidate', compact('articles'));
    }
    
    public function edit($id) {
        $articleData = \App\Article::find($id);
        $validation = new \App\Validation();
        //permet l'affichage du bouton pour la validation
        $articleValidated = $validation->isValidated($id);
        
        return view('validator.article.edit', compact('articleData', 'articleValidated'));
    }
    
    public function update(Request $request, $id) {
        $article = \App\Article::find($id);
        
        $this->validate($request, [
            'justification' => 'required'
        ]);
        
        $validation = new \App\Validation([
            'article_id' => $article->id,
            'validator_id' => Auth::id(),
            'status' => '0',
            'justification' => $request['justification']
        ]);
        
        $validation->save();
        
        session()->flash('notification', "L'article a bien été refusé");
        
        return redirect('validation/toValidate');
    }
    
    public function validated() {
        dd('ok validated');
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
