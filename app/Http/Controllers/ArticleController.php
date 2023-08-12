<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Computre;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.index',
                  ['articles'=>Article::all()
                ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'article-title' => 'required',
            'article-content' => 'required',
            
        ]);

       $article = new Article();
       $article -> title   = strip_tags($request -> input('article-title')) ;
       $article -> content =strip_tags( $request -> input('article-content')) ;
       $article -> user_id   =auth()->user()->id ;

       $article -> save();

       return redirect() -> route ('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($article)
    {
        return view('article.show',[
            'article' => Article::findOrFail($article)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($article)
    {
        return view('article.edit',[
            'article' => Article::findOrFail($article)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $article)
    {
        $request -> validate([
            'article-title' => 'required',
            'article-content' => 'required',

        ]);

        $to_update = Article::findOrFail($article);
        $to_update -> title   = strip_tags($request -> input('article-title')) ;
        $to_update -> content =strip_tags( $request -> input('article-content')) ;
        $to_update -> user_id   =auth()->user()->id ;

        $to_update -> save();

       return redirect() -> route ('article.show',$article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($article)
    {
        $to_delete =  Article::findOrFail($article);
        $to_delete -> delete();
        return redirect() -> route ('article.index');
    }
}
