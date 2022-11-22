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
        // $articles = Article::all();
        // return ['articles' => $articles];
        $client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('https://api.newscatcherapi.com/v2/search');
$request->setRequestMethod('GET');
$request->setQuery(new http\QueryString([
	'q' => 'Google',
	'lang' => 'en',
	'sort_by' => 'relevancy',
	'page' => '1'
]));

$request->setHeaders([
	'x-api-key' => 'w--MJJkPfAxjSNUunHldQdUCN22CMLKDMUALuYXDf7k'
]);

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
    }

    public function storeArticle($request){
        $exist_article = Article::where('title',$request->title)->first();
        if (isset($exist_article) && count($exist_article)) {
            return response()->json(['message' => 'This Article posted on '.$exist_article->created_at]);
        } else {
            $article = new Article();
            $article->user_id = 1;
            $article->title = $request->title;
            $article->short_description = $request->short_description;
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $article->image = $filename;
            $article->save();
            return redirect(route('article.index'));
        }

    }

    public function deleteArticle($id){
        $article = Article::find($id);
        $article->delete();
        return redirect(route('article.index'));
    }
}
