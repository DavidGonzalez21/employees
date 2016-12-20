<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('Employees')->insert([
          'first_name' => 'david humberto',
          'last_name' => 'gonzalez',
          'other_name' => 'calvillo',
          'email' => 'david.gonzalez@clickittech.com',
          'phone' => '8442896585',
          'user_skype' => 'dgonzalez',
          'date_of_birth' => '1994-12-20',
          'hire_date' => '2015-10-05',
          'profile_photo' => 'images/employees/default.png'
      ]);
    }
}
