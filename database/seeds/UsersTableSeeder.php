<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            'first_name' => 'vicente baltazar',
            'last_name' => 'garcía',
            'other_name' => 'gonzalez',
            'email' => 'vbgarciag@gmail.com',
            'password' => bcrypt('intensos21'),
            'cell_phone' => '8445675141',
            'profile_photo' => 'images/employees/default.png'
        ]);
    }
}
