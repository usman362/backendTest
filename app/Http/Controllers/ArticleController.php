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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->articleRepository->getArticles();
    }

    public function store(StoreArticleRequest $request){
        return $this->articleRepository->storeArticle($request);
    }

    public function destroy($id){
        return $this->articleRepository->deleteArticle($id);
    }
}