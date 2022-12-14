<?php

namespace App\Console\Commands;

use App\Jobs\CreateNewsJob;
use App\Jobs\PingJob;
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

        try{
            CreateNewsJob::dispatch();
            $this->info("fetching news in process");
        }catch(\Exception $e){
            $this->error("Error: ".$e->getMessage());
        }
    }
}
