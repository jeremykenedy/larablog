<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {limit=-1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

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
     * @return mixed
     */
    public function handle()
    {
        $limit = config('blog.services.siteMapLimit');

        if ($this->argument('limit')) {
            $limit = $this->argument('limit');
        }

        SitemapGenerator::create(config('app.url'))
            ->setMaximumCrawlCount($limit)
            ->writeToFile(public_path('sitemap.xml'));
    }
}
