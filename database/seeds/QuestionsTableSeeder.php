<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();

        $questions = [
            [
                'id' => '1',
                'title' => 'Werkend leren',
                'body' => 'School werkt volgens het principe: Learning by doing. Het werkend leren, zo reëel en realistisch mogelijk, staat centraal.',
                'theme_id' => '1'
            ],
            [
                'id' => '2',
                'title' => 'Professsionele relatie met werkgevers',
                'body' => 'School hanteert een professionele aanpak in de relatie met werkgevers en heeft dus kennis van context, belangen en taal van bedrijven.',
                'theme_id' => '1'
            ],
            [
                'id' => '3',
                'title' => 'Proactieve samenwerking bij arbeidstoeleiding',
                'body' => 'School werkt naar werkgevers toe proactief samen met organisaties/intermediairs op het vlak van arbeidstoeleiding.',
                'theme_id' => '1'
            ],
        ];

        DB::table('questions')->insert($questions);
    }
}
