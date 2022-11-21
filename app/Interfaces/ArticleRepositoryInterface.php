<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
interface ArticleRepositoryInterface
{

    public function getArticles();

    public function storeArticle($request);

    public function deleteArticle($id);
}
