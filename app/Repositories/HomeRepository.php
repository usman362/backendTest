<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Interfaces\HomeRepositoryInterface;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class HomeRepository implements HomeRepositoryInterface
{
    public function getArticles(){
        $articles = Article::paginate(10);
        return ['articles' => $articles];
    }

    public function showArticle($id){
        $article = Article::find($id);
        return ['article' => $article];
    }

}
