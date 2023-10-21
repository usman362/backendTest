<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CreateNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
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
