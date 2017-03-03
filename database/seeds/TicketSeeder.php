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
            'jug'       => false
        ]);

        Ticket::create([
            'name'      => 'Belépő + Korsó',
            'price'     => 1500,
            'jug'       => true,
        ]);

        Ticket::create([
            'name'      => 'Belépő + Ajándék',
            'price'     => 1500,
            'jug'       => false
        ]);

        Ticket::create([
            'name'      => 'Belépő + Korsó + Ajándék',
            'price'     => 2000,
            'jug'       => true
        ]);

    }
}
