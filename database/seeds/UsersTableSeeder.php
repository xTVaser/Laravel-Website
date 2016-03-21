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
            //Guest Account
            DB::table('users')->insert([
                'email' => 'guest@test.com',
                'password' => bcrypt('test123'),
                'flag' => 0,
            ]);
            //Faculty Account
            DB::table('users')->insert([
                'email' => 'faculty@test.com',
                'password' => bcrypt('test123'),
                'flag' => 1,
            ]);
            //Hiring Committee Member Account
            DB::table('users')->insert([
                'email' => 'member@test.com',
                'password' => bcrypt('test123'),
                'flag' => 2,
            ]);
            //Hiring Chair Account
            DB::table('users')->insert([
                'email' => 'chair@test.com',
                'password' => bcrypt('test123'),
                'flag' => 3,
            ]);
    }
}
