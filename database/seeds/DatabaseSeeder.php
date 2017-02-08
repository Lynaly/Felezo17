<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        if( env('APP_ENV') == 'local' ) {
            $this->call(UserSeeder::class);
            $this->call(TicketSeeder::class);
            $this->call(OrderSeeder::class);
        }
    }
}
