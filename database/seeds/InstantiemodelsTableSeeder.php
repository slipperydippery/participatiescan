<?php

use Illuminate\Database\Seeder;

class InstantiemodelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instantiemodels')->delete();

        $instantiemodels = [
            [
                'title' => 'VSO / PRO scholen',
                'description' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Sociale Diensten / Werkbedrijf',
                'description' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Leerplicht / RMC',
                'description' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Werkgevers (vertegenwoordigers)',
                'description' => '',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Zorg',
                'description' => 'bijv MEE, Jeugdzorg.',
                'scanmodel_id' => '1'
            ],
            [
                'title' => 'Overig',
                'description' => 'bijv UWV, Projectorganisaties.',
                'scanmodel_id' => '1'
            ],
        ];

        DB::table('instantiemodels')->insert($instantiemodels);
    }
}
