<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GenerateNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Generate News';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::withHeaders([
            'x-api-key' => 'w--MJJkPfAxjSNUunHldQdUCN22CMLKDMUALuYXDf7k'
        ])->get('https://api.newscatcherapi.com/v2/latest_headlines',[
            'sources' => 'forbes.com',
            'page_size' => 100,
        ]);
        $articles = $response->collect()['articles'];
        foreach ($articles as $key => $article) {
            $exist_article = Article::where('title',$article['title'])->first();
            if (!isset($exist_article)) {
                $data = new Article();
                $data->title = $article['title'];
                $data->short_description = $article['summary'];
                $data->image = $article['media'];
                $data->image_type = 'url';
                $data->author = $article['author'];
                $data->created_at = $article['published_date'];
                $data->save();
            }

        }
    }
}
