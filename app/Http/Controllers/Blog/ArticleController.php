<?php

namespace App\Http\Controllers\Blog;

use App\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function home()
    {
        $articles = Article::all();

        return view('blog.home', compact('articles'));
    }

    public function article(Article $article)
    {
        return view('blog.article', compact('article'));
    }

    public function add()
    {
        return view('blog.add');
    }

    public function apiAdd(Request $request)
    {
        $user = $request->user();

        $article = new Article($request->all());

        $article->user_id = $user->id;

        $article->save();

        return redirect()->route('blog.home');
    }

    public function edit(Article $article)
    {
        return view('blog.edit', compact('article'));
    }

    public function apiEdit(Request $request, Article $article)
    {
        $user = $request->user();

        if($user->id == $article->user->id)
        {

            $article->title = $request->title;
            $article->body = $request->body;

            $article->save();
        }

        return redirect()->route('blog.home');
    }

    public function apiDelete(Request $request)
    {
        $user = $request->user();

        $article = Article::find($request->input('article'));

        if($user->id == $article->user->id)
        {
            $article->delete();
        }
    }
}
