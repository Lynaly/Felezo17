<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'admin',
            'display_name'  => 'Admin',
            'description'   => 'Administrator'
        ]);

        Role::create([
            'name'          => 'organizer',
            'display_name'  => 'Rendező',
            'description'   => 'Rendező'
        ]);

        Role::create([
            'name'          => 'participant',
            'display_name'  => 'Résztvevő',
            'description'   => 'Résztvevő'
        ]);
    }
}
