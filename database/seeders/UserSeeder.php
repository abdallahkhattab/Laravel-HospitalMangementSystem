<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //  DB::table('users')->delete();
      /*
        DB::table('users')->insert([
            'name' => 'user',
            'email' =>'user@gmail.com',
            'password' => Hash::make('password'),

        ]);*/

        /*
        DB::table('laboratorie_employees')->insert([
            'name'=> 'laboratorie',
            'email'=> 'laboratorie@gmail.com',
            'password'=> Hash::make('password'),
        ]);*/

        DB::table('patients')->insert([
            'email'=> 'patient1@gmail.com',
            'Date_Birth'=>'2025-03-03',
            'phone'=>'01234567893',
            'address'=>'new york',
            'Blood_Group'=>'o+',
            'Gender'=>'male',
            'password'=> Hash::make('password1234'),
        ]);
    }
}
