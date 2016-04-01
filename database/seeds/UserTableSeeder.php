<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
            //Guest Account
            $id = DB::table('users')->insertGetId([
                'email' => 'guest@test.com',
                'password' => bcrypt('test123'),
                'flag' => 0,
            ]);

            DB::table('profiles')->insert([
                    'user_id' => $id,
                    'first_name' => 'Guest',
                    'middle_name' => 'G',
                    'last_name' => 'Account',
                    'gender' => 'Male',
                    'job_title' => 'Guest',
                    'department' => 'Testing',
                    'company' => 'GIGO Solutions',
                    'birthdate' => '1995-02-20',
                    'contact_email' => 'guest@test.com',
                    'linkedin_link' => 'theBestGuest'
            ]);

            //Faculty Account
            $id = DB::table('users')->insertGetId([
                'email' => 'faculty@test.com',
                'password' => bcrypt('test123'),
                'flag' => 1,
            ]);

            DB::table('profiles')->insert([
                    'user_id' => $id,
                    'first_name' => 'Faculty',
                    'middle_name' => 'F',
                    'last_name' => 'Account',
                    'gender' => 'Female',
                    'job_title' => 'Faculty',
                    'department' => 'Testing',
                    'company' => 'GIGO Solutions',
                    'birthdate' => '1995-02-20',
                    'contact_email' => 'faculty@test.com',
                    'linkedin_link' => 'theBestFaculty'
            ]);

            //Hiring Committee Member Account
            $id = DB::table('users')->insertGetId([
                'email' => 'member@test.com',
                'password' => bcrypt('test123'),
                'flag' => 2,
            ]);

            DB::table('profiles')->insert([
                    'user_id' => $id,
                    'first_name' => 'Member',
                    'middle_name' => 'G',
                    'last_name' => 'Account',
                    'gender' => 'Other',
                    'job_title' => 'Member',
                    'department' => 'Testing',
                    'company' => 'GIGO Solutions',
                    'birthdate' => '1995-02-20',
                    'contact_email' => 'member@test.com',
                    'linkedin_link' => 'theBestMember'
            ]);

            //Hiring Chair Account
            $id = DB::table('users')->insertGetId([
                'email' => 'chair@test.com',
                'password' => bcrypt('test123'),
                'flag' => 3,
            ]);

            DB::table('profiles')->insert([
                    'user_id' => $id,
                    'first_name' => 'Chair',
                    'middle_name' => 'G',
                    'last_name' => 'Account',
                    'gender' => 'Male',
                    'job_title' => 'Chair',
                    'department' => 'Testing',
                    'company' => 'GIGO Solutions',
                    'birthdate' => '1995-02-20',
                    'contact_email' => 'chair@test.com',
                    'linkedin_link' => 'theThrone'
            ]);
    }
}
