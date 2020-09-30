<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Questionnaire::class, 5)->create();
        factory(\App\Models\Question::class, 25)->create();
    }
}
