<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index () {
        return view('welcome',[
            'articals'=>Article::all()
        ]);
    }
    public function about () {
        return view('about');
    }
    
    public function contact  () {
        return view('contact');
    }


}
