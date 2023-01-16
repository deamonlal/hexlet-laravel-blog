<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller {

    public function index() {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    public function create() {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(Request $request) {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|max:1000'
        ]);
        $article = new Article();
        $article->fill($data);
        $article->save();
        
        return redirect()->route('article.index');
    }

    public function show($id) {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

}
