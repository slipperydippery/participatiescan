<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->delete();

        $districts = [
            [
            'scan_id' => '1',
            'districtmodel_id' => '1',
            ],
        ];

        DB::table('districts')->insert($districts);
    }
}
