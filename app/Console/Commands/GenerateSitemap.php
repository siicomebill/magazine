<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Browsershot\Browsershot;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a complete sitemap by crawling your entire website';

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
        $mainRoute = route("home");
        $destinationPath = public_path('sitemap.xml');

        SitemapGenerator::create($mainRoute)
            ->configureCrawler(function (Crawler $crawler) {
                $chromePath = config('sitemap.chrome_binary_path');
                $nodeModulesPath = base_path('node_modules');

                $browsershot = new Browsershot;

                $browsershot
                    ->setChromePath($chromePath)
                    ->noSandbox()
                    ->setNodeModulePath($nodeModulesPath);

                $crawler
                    ->ignoreRobots()
                    ->setUserAgent('sitemap-generator-crawler')
                    ->setBrowsershot($browsershot);
            })
            ->writeToFile($destinationPath);
    }
}
