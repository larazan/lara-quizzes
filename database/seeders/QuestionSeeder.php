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
            [
                'question_text' => 'What is the capital city of France?',
                'image_path' => 'question_images/paris.jpg',
                'difficulty' => 'easy',
                'order' => 4,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which city is the capital of Australia?',
                'image_path' => null,
                'difficulty' => 'medium',
                'order' => 5,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'What is the capital of Canada?',
                'image_path' => null,
                'difficulty' => 'easy',
                'order' => 6,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which African country has Abuja as its capital?',
                'image_path' => null,
                'difficulty' => 'medium',
                'order' => 7,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'What is the capital city of Brazil?',
                'image_path' => 'question_images/brasilia.jpg',
                'difficulty' => 'hard',
                'order' => 8,
                'is_private' => false,
                'created_by' => 1,
            ],

            // 🧪 Science
            [
                'question_text' => 'What is the chemical symbol for gold?',
                'difficulty' => 'easy',
                'order' => 1,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => 'How many bones are in the adult human body?',
                'difficulty' => 'medium',
                'order' => 2,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which planet has the most moons?',
                'difficulty' => 'hard',
                'order' => 3,
                'image_path' => 'questions/jupiter.jpg',
                'created_by' => 1,
            ],
            [
                'question_text' => 'What planet is known as the Red Planet?',
                'image_path' => null,
                'difficulty' => 'easy',
                'order' => 4,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'What gas do humans need to breathe in order to survive?',
                'image_path' => null,
                'difficulty' => 'easy',
                'order' => 5,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'What is H₂O commonly known as?',
                'image_path' => null,
                'difficulty' => 'easy',
                'order' => 6,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'What part of the plant conducts photosynthesis?',
                'image_path' => null,
                'difficulty' => 'easy',
                'order' => 7,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'How many planets are there in our solar system?',
                'image_path' => null,
                'difficulty' => 'easy',
                'order' => 8,
                'is_private' => false,
                'created_by' => 1,
            ],

            //
            [
                'question_text' => 'Which ancient city was buried under volcanic ash after the eruption of Mount Vesuvius in 79 AD?',
                'image_path' => 'question_images/pompeii.jpg',
                'difficulty' => 'hard',
                'order' => 1,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'The Code of Hammurabi was a set of laws from which ancient civilization?',
                'image_path' => null,
                'difficulty' => 'hard',
                'order' => 2,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Who was the famous Carthaginian general who crossed the Alps to fight Rome?',
                'image_path' => null,
                'difficulty' => 'hard',
                'order' => 3,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'The Great Library of Alexandria was located in which ancient empire?',
                'image_path' => 'question_images/alexandria.jpg',
                'difficulty' => 'hard',
                'order' => 4,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which ancient civilization built Machu Picchu?',
                'image_path' => 'question_images/machu_picchu.jpg',
                'difficulty' => 'hard',
                'order' => 5,
                'is_private' => false,
                'created_by' => 1,
            ],

            // 🎬 Movies
            [
                'question_text' => 'Who directed the movie "Inception"?',
                'difficulty' => 'medium',
                'order' => 1,
                'image_path' => 'questions/inception.jpg',
                'created_by' => 1,
            ],
            [
                'question_text' => 'In which year was the first "Harry Potter" movie released?',
                'difficulty' => 'easy',
                'order' => 2,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => '“May the Force be with you.” — From which movie is this iconic quote?',
                'image_path' => 'question_images/star_wars.jpg',
                'difficulty' => 'medium',
                'order' => 3,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => '“I’m the king of the world!” — Which blockbuster features this line?',
                'image_path' => 'question_images/titanic.jpg',
                'difficulty' => 'medium',
                'order' => 4,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => '“Here’s looking at you, kid.” — This quote is from which classic film?',
                'image_path' => null,
                'difficulty' => 'medium',
                'order' => 5,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => '“Why so serious?” — Who delivers this chilling line?',
                'image_path' => 'question_images/joker.jpg',
                'difficulty' => 'medium',
                'order' => 6,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => '“You can’t handle the truth!” — Which courtroom drama features this quote?',
                'image_path' => null,
                'difficulty' => 'medium',
                'order' => 7,
                'is_private' => false,
                'created_by' => 1,
            ],

            // ⚽ Sports
            [
                'question_text' => 'How many players are on a soccer team on the field?',
                'difficulty' => 'easy',
                'order' => 1,
                'image_path' => null,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which country won the FIFA World Cup in 2018?',
                'difficulty' => 'medium',
                'order' => 2,
                'image_path' => 'questions/worldcup.jpg',
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which country won the FIFA World Cup in 2018?',
                'image_path' => 'question_images/world_cup.jpg',
                'difficulty' => 'medium',
                'order' => 3,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'In basketball, how many points is a shot made from beyond the arc worth?',
                'image_path' => null,
                'difficulty' => 'medium',
                'order' => 4,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Who has won the most Grand Slam titles in men’s tennis history?',
                'image_path' => 'question_images/tennis.jpg',
                'difficulty' => 'medium',
                'order' => 5,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'Which athlete is known as “The Fastest Man Alive”?',
                'image_path' => 'question_images/usain_bolt.jpg',
                'difficulty' => 'medium',
                'order' => 6,
                'is_private' => false,
                'created_by' => 1,
            ],
            [
                'question_text' => 'In baseball, how many players are on the field for one team during play?',
                'image_path' => null,
                'difficulty' => 'medium',
                'order' => 7,
                'is_private' => false,
                'created_by' => 1,
            ],

            
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
