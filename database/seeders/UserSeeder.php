<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name' => 'Admin Default',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'address' => 'Admin Home Address',
            'locality' => 'Some Admin Locality',
            'type' => 'Commercial',
            'purpose' => 'Administration',
            'rent_amt' => 0
            ]);
            DB::table('users')->insert(
            [
                'name' => 'Manager Default',
                'email' => 'manager@gmail.com',
                'password' =>  Hash::make('password'),
                'role' => 'manager',
                'address' => 'manager Home Address',
                'locality' => 'Some manager Locality',
                'type' => 'Residential',
                'purpose' => 'Management',
                'rent_amt' => 0
            ]
    );

   
    }
}
