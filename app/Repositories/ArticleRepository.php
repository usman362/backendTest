<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Interfaces\ArticleRepositoryInterface;
use App\Jobs\TestJob;
use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getArticles(){
        $articles = Article::all();
        return ['articles' => $articles];
    }

    public function storeArticle($request){
        $exist_article = Article::where('title',$request->title)->first();
        if (isset($exist_article)) {
            TestJob::dispatch($request);
            return response()->json(['message' => 'This Article posted on '.$exist_article->created_at]);
        } else {
            $article = new Article();
            $article->author = Auth::user()->name;
            $article->title = $request->title;
            $article->short_description = $request->short_description;
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $article->image = $filename;
            $article->image_type = 'local';
            $article->save();
            TestJob::dispatch($request);
            return redirect(route('article.index'))->with('success','Article has Created successfully');;
        }
    }

    public function deleteArticle($id){
        $article = Article::find($id);
        $article->delete();
        return redirect(route('article.index'))->with('success','Article deleted successfully');;
    }
}
