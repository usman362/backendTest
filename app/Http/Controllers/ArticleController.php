<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Interfaces\ArticleRepositoryInterface;
class ArticleController extends Controller
{

    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo("article-list")) return redirect()->route('article.index')->withErrors("You are not allowed to Show Articles");
        $articles = $this->articleRepository->getArticles();
        return view('pages.articles.index',$articles);
    }

    public function create(){
        if(!auth()->user()->hasPermissionTo("article-create")) return redirect()->route('article.index')->withErrors("You are not allowed to Create Articles");
        return view('pages.articles.create');
    }

    public function store(StoreArticleRequest $request){
        if(!auth()->user()->hasPermissionTo("article-create")) return redirect()->route('article.index')->withErrors("You are not allowed to Create Articles");
        return $this->articleRepository->storeArticle($request);
    }

    public function destroy($id){
        if(!auth()->user()->hasPermissionTo("article-delete")) return redirect()->route('article.index')->withErrors("You are not allowed to Delete Articles");
        return $this->articleRepository->deleteArticle($id);
    }
}
