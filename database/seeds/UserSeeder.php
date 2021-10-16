<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [ 'name' => 'aounhassan1',
            'email' => 'admin1@mail.com',
            'type' => '1',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
            ['name' => 'Aounhassan2',
            'email' => 'admin2@mail.com',
            'type' => '1',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);
        DB::table('users')->insert([
            [ 'name' => 'aounshah1',
            'fname' => 'Shahzad',
            'phone' => '03030000000',
            'cnic' => '00000-0000000-0',
            'email' => 'user1@mail.com',
            'password' => Hash::make('1234'),
            'city' => 'Sargodha',
            'address' => 'Farooq Colony',
            'code' => uniqid(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
            ['name' => 'aounhassan1',
            'fname' => 'Israr',
            'phone' => '03000000000',
            'cnic' => '00000-0000000-1',
            'email' => 'user2@mail.com',
            'password' => Hash::make('1234'),
            'city' => 'Sargodha',
            'address' => 'Farooq Colony',
            'code' => uniqid(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);
        DB::table('payments')->insert([
            [ 'method' => 'Bank',
            'name' => 'Shahzad',
            'number' => '03030000000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
        ]);
        DB::table('ads')->insert([
            [ 'link' => 'https://www.youtube.com/embed/mUmxdKMx-uY',
            'name' => 'Babar Azam',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
        ]);

    }
}
