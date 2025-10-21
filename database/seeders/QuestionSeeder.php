<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $questions = [
            // 🌍 Geography
            [
                'question_text' => 'What is the capital city of France?',
                'difficulty' => 'easy',
                'order' => 1,
                'image_path' => 'questions/paris.jpg',
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which country has the longest coastline in the world?',
                'difficulty' => 'medium',
                'order' => 2,
                'image_path' => 'questions/canada.jpg',
                'created_by' => 1,
            ],
            [
                'question_text' => 'Mount Kilimanjaro is located in which country?',
                'difficulty' => 'hard',
                'order' => 3,
                'image_path' => 'questions/kilimanjaro.jpg',
                'created_by' => 1,
            ],

            // 🧪 Science
            [
                'question_text' => 'What is the chemical symbol for gold?',
                'difficulty' => 'easy',
                'order' => 4,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => 'How many bones are in the adult human body?',
                'difficulty' => 'medium',
                'order' => 5,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which planet has the most moons?',
                'difficulty' => 'hard',
                'order' => 6,
                'image_path' => 'questions/jupiter.jpg',
                'created_by' => 1,
            ],

            // 🎬 Movies
            [
                'question_text' => 'Who directed the movie "Inception"?',
                'difficulty' => 'medium',
                'order' => 7,
                'image_path' => 'questions/inception.jpg',
                'created_by' => 1,
            ],
            [
                'question_text' => 'In which year was the first "Harry Potter" movie released?',
                'difficulty' => 'easy',
                'order' => 8,
                'image_path' => null,
                'created_by' => 1,
            ],

            // ⚽ Sports
            [
                'question_text' => 'How many players are on a soccer team on the field?',
                'difficulty' => 'easy',
                'order' => 9,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which country won the FIFA World Cup in 2018?',
                'difficulty' => 'medium',
                'order' => 10,
                'image_path' => 'questions/worldcup.jpg',
                'created_by' => 1,
            ],
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
