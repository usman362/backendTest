<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
interface HomeRepositoryInterface
{

    public function getArticles();

    public function showArticle($id);

}
