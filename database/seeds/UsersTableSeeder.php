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
                'name' => 'gast',
                'email' => 'gast@gast.nl',
                'password' => Hash::make('password')
            ],
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
            [
                'name' => 'guest',
                'email' => 'guest@guest.com',
                'password' => Hash::make('guest')
            ],
        ];

        DB::table('users')->insert($users);
    }
}
