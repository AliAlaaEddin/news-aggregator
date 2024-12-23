<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateArticlesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-articles-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will re-fetch all the articles from the available data sources.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startTime = now()->subHour()->startOfHour();
        $endTime = now()->subHour()->endOfHour();

        

    }
}
