<?php

use Illuminate\Database\Seeder;

class MeasuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measures')->delete();

        $measures = [
            [
                    'scan_id' => '1',
                    'question_id' => '1'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '2'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '3'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '4'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '5'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '6'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '7'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '8'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '9'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '10'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '11'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '12'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '13'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '14'
            ],
            [
                    'scan_id' => '1',
                    'question_id' => '15'
            ],
        ];

        DB::table('measures')->insert($measures);
    }
}
