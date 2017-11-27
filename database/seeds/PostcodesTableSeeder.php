<?php

use Illuminate\Database\Seeder;

class PostcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postcodes')->delete();

        $postcodes = [
            [
                'postcode' => 1056,
            ],
        ];

        DB::table('postcodes')->insert($postcodes);
    }
}
