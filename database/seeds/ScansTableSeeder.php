<?php

use Illuminate\Database\Seeder;

class ScansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scans')->delete();

        $scans = [
            [
            	'id' => '1',
            	'title' => 'Testscan',
            	'description' => '',
            	'user_id' => '1',
            	'scanmodel_id' => '1',
            	'activetheme' => '1',
            	'activequestion' => '0',
            ],
        ];

        DB::table('scans')->insert($scans);
    }
}
