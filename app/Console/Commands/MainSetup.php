<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MainSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All-in-one command for setting up the development environment.';

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
        Artisan::queue('key:generate');
        Artisan::queue('migrate');
        Artisan::queue('twill:build');
        Artisan::queue('setup:reactions');
        Artisan::queue('db:seed');
    }
}
