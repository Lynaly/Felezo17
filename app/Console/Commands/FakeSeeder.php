<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use NewsSeeder;
use OrderSeeder;
use TicketSeeder;
use UserSeeder;

class FakeSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if( env('APP_ENV') == 'local' ) {
            $seeders = [
                new UserSeeder(),
                new NewsSeeder(),
                new TicketSeeder(),
                new OrderSeeder()
            ];

            foreach ($seeders as $seeder) {
                $seeder->run();
            }
        }
    }
}
