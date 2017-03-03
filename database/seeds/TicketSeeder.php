<?php

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'name'      => 'Belépő',
            'price'     => 1000,
            'amount'    => 70
        ]);

        Ticket::create([
            'name'      => 'Belépő + Korsó',
            'price'     => 1500,
            'amount'    => 30
        ]);

        Ticket::create([
            'name'      => 'Belépő + Ajándék',
            'price'     => 1500,
            'amount'    => 20
        ]);

        Ticket::create([
            'name'      => 'Belépő + Korsó + Ajándék',
            'price'     => 2000,
            'amount'    => 30
        ]);

        /*
        if( env('APP_ENV') == 'local' ) {
            factory(Ticket::class, random_int(2, 5))->create();
        }*/
    }
}
