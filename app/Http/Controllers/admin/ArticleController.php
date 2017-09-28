<?php

namespace App\Http\Controllers\admin;

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
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = \App\Category::all()->pluck('name', 'id');

        return view('admin.article.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'category_id' => 'bail|required|integer|min:1',
            'title' => 'bail|required|max:191',
            'content' => 'bail|required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploadArticle', 'public');
        }

        auth()->user()->publish(
                new \App\Article([
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $imagePath,
            'slug' => str_slug($request['title'], '-'),
                ])
        );

        session()->flash('notification', "L'article a bien été créé !");

        return redirect('/backoffice/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $article = \App\Article::find($id);

        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categories = \App\Category::all()->pluck('name', 'id');
        $article = \App\Article::find($id);

        return view('admin.article.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'category_id' => 'bail|required|integer|min:1',
            'title' => 'bail|required|max:191',
            'content' => 'bail|required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:1000'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploadArticle', 'public');
        }

        \App\Article::find($id)
                ->update([
                    'category_id' => $request['category_id'],
                    'title' => $request['title'],
                    'content' => $request['content'],
                    'image' => $imagePath,
                    'slug' => str_slug($request['title'], '-'),
        ]);

        session()->flash('notification', "L'article a bien été modifié !");

        return redirect('/backoffice/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $article = \App\Article::find($id);
        $image = storage_path('app/public/' . $article->image);
        //dd($image);
        \Illuminate\Support\Facades\File::delete($image);
        $article->delete();

        session()->flash('notification', "L'article a bien été supprimé !");

        return redirect('/backoffice/articles');
    }

}
