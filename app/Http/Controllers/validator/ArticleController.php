<?php

namespace App\Http\Controllers\validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Validation;
use App\User;

class ArticleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $articles = Article::paginate(10);

        //initialisiation de la localisation pour traduire les dates
        \Carbon\Carbon::setLocale('fr');
        return view('validateur.article.index', compact('articles'));
    }

    /**
     * Affiche tous les articles à valider
     * @return \Illuminate\Http\Response
     */
    public function toValidate() {
        $article = new Article();
        $articles = $article->toValidate();

        return view('validator.article.toValidate', compact('articles'));
    }

    /**
     * Affiche l'article pour une validation
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        $articleData = Article::findOrFail($id);
        $validation = new Validation();
        //permet l'affichage du bouton pour la validation
        $articleValidated = $validation->isValidated($id);

        return view('validator.article.edit', compact('articleData', 'articleValidated'));
    }

    /**
     * Permet de valider ou non l'article
     * @param Request $request
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article) {

        $this->validate($request, [
            'status' => 'required|integer|min:0|max:1'
        ]);

        //si l'article est refusé le validateur doit fournir une justification
        if ($request['status'] == 0) {
            $this->validate($request, [
                'justification' => 'required'
            ]);
        }

        Validation::create([
            'article_id' => $article->id,
            'validator_id' => Auth::id(),
            'status' => $request['status'],
            'justification' => $request['justification']
        ]);

        //$validation->save();

        session()->flash('notification', "L'article a bien été refusé");

        return redirect('validation/toValidate');
    }

    /**
     * Affiche tous les articles validés par le validateur en cours
     * @return \Illuminate\Http\Response
     */
    public function validated() {
        $user = new User();
        $validatedByUser = $user->find(Auth::id())->validations;
        //dd($validatedByUser);

        return view('validator.article.validated', compact('validatedByUser'));
    }

    /**
     * Affiche l'article pour mettre à jour la validation
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Validation $validation) {
        //$articleData = Article::findOrFail($id);
        //$validation = new Validation();
        //permet l'affichage du bouton pour la validation
        $articleValidated = $validation->isValidated($validation->article_id);

        return view('validator.article.showUpdate', compact('validation', 'articleValidated'));
    }

    /**
     * Permet au validateur de modifier une de ses validations
     * @param Request $request
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validation $validation) {
        //$validation = Validation::find($id);

        if (Auth::id() !== $validation->validator_id) {
            session()->flash('notification', "Cet article n'a pas été validé par vous.");
            redirect('/validation/validated');
        }

        $this->validate($request, [
            'status' => 'required|integer|min:0|max:1'
        ]);

        if ($request['status'] == $validation->status) {
            session()->flash('notification', "Cet article possède déjà ce status.");
            redirect('/validation/validated');
        }

        $validation = new Validation([
            'status' => $request['status'],
        ]);

        $validation->save();

        session()->flash('notification', "Le status de l'article a bien été changé");

        return redirect('validation/validated');
    }

    /**
     * Affiche les détails d'un article
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article) {
        //$article = \App\Article::find($id);

        return view('validateur.article.show', compact('article'));
    }

}
