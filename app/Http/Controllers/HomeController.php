<?php

namespace App\Http\Controllers;

use App\Interfaces\HomeRepositoryInterface;
use Illuminate\Http\Request;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private HomeRepositoryInterface $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index()
    {
        // $response = Http::withHeaders([
        //     'x-api-key' => 'w--MJJkPfAxjSNUunHldQdUCN22CMLKDMUALuYXDf7k'
        // ])->get('https://api.newscatcherapi.com/v2/latest_headlines',[
        //     'sources' => 'forbes.com'
        // ]);
        // dd($response->collect()['articles']);
        $articles = $this->homeRepository->getArticles();
        //TestJob::Dispatch($articles);
        return view('frontend.pages.index',$articles);

    }

    public function show($id){
        $article = $this->homeRepository->showArticle($id);
        return view('frontend.pages.single',$article);
    }
}
