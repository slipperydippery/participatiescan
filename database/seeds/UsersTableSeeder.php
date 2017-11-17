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
        DB::table('users')->delete();

        $users = [
            [
                'name' => 'Susanne Meeuwissen',
                'email' => 'susanne@embav.nl',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Maarten de Jager',
                'email' => 'maartendejager@gmail.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'admin',
            	'email' => 'admin@temp.com',
            	'password' => Hash::make('password')
            ],
        ];

        DB::table('users')->insert($users);
    }
}