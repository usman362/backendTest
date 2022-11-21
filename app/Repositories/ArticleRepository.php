<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getArticles(){
        //
    }

    public function storeArticle($request){
        $exist_article = Article::where('title',$request->title)->first();
        if (count($exist_article) > 0) {
            return response()->json(['message' => 'This Article posted on '.$exist_article->created_at]);
        } else {
            $article = new Article();
            $article->user_id - Auth::user()->id;
            $article->title = $request->title;
            $article->short_description = $request->short_description;
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $article->image = $filename;
            $article->save();
            return response()->json(['message' => 'Article has been Successfully Added']);
        }

    }

    public function deleteArticle($id){
        $article = Article::find($id);
        $article->delete();
        return response()->json(['message' => 'Article has been Successfully Deleted']);
    }
}
