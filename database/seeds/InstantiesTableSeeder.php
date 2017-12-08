<?php

use Illuminate\Database\Seeder;

class InstantiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instanties')->delete();

        $instanties = [
            [
            'scan_id' => '1',
            'instantiemodel_id' => '1',
            ],
        ];

        DB::table('instanties')->insert($instanties);
    }
}
