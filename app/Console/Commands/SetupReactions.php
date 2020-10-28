<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupReactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:reactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all the needed reaction entities';

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
        $reactions = config('reactions', []);

        foreach ($reactions as $reaction) {
            Artisan::queue('love:reaction-type-add', [
                '--name' => $reaction["name"],
                '--mass' => $reaction["value"],
            ]);
        }

        Artisan::queue('love:setup-reacterable', [
            "--model" => "App\Models\User"
        ]);

        Artisan::queue('migrate');

        Artisan::queue('love:register-reacters', [
            "--model" => "App\Models\User"
        ]);
    }
}
