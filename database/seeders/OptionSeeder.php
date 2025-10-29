<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $questions = Question::all();

        // if ($questions->isEmpty()) {
        //     $this->command->warn('No questions found — please seed questions first.');
        //     return;
        // }

        // foreach ($questions as $question) {
        //     switch (true) {
        //         case str_contains(strtolower($question->question_text), 'capital'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Paris', 'is_correct' => true],
        //                 ['label' => 'B', 'text' => 'London', 'is_correct' => false],
        //                 ['label' => 'C', 'text' => 'Berlin', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => 'Madrid', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'coastline'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Russia', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => 'Canada', 'is_correct' => true],
        //                 ['label' => 'C', 'text' => 'Australia', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => 'Indonesia', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'kilimanjaro'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Kenya', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => 'Uganda', 'is_correct' => false],
        //                 ['label' => 'C', 'text' => 'Tanzania', 'is_correct' => true],
        //                 ['label' => 'D', 'text' => 'Ethiopia', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'gold'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Ag', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => 'Go', 'is_correct' => false],
        //                 ['label' => 'C', 'text' => 'Au', 'is_correct' => true],
        //                 ['label' => 'D', 'text' => 'Gd', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'bones'):
        //             $options = [
        //                 ['label' => 'A', 'text' => '198', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => '206', 'is_correct' => true],
        //                 ['label' => 'C', 'text' => '210', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => '215', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'moons'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Earth', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => 'Jupiter', 'is_correct' => true],
        //                 ['label' => 'C', 'text' => 'Mars', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => 'Saturn', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'inception'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Christopher Nolan', 'is_correct' => true],
        //                 ['label' => 'B', 'text' => 'James Cameron', 'is_correct' => false],
        //                 ['label' => 'C', 'text' => 'Steven Spielberg', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => 'Ridley Scott', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'harry potter'):
        //             $options = [
        //                 ['label' => 'A', 'text' => '1999', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => '2001', 'is_correct' => true],
        //                 ['label' => 'C', 'text' => '2003', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => '2005', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'soccer'):
        //             $options = [
        //                 ['label' => 'A', 'text' => '9', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => '10', 'is_correct' => false],
        //                 ['label' => 'C', 'text' => '11', 'is_correct' => true],
        //                 ['label' => 'D', 'text' => '12', 'is_correct' => false],
        //             ];
        //             break;

        //         case str_contains(strtolower($question->question_text), 'world cup'):
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Germany', 'is_correct' => false],
        //                 ['label' => 'B', 'text' => 'France', 'is_correct' => true],
        //                 ['label' => 'C', 'text' => 'Brazil', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => 'Argentina', 'is_correct' => false],
        //             ];
        //             break;

        //         default:
        //             // generic fallback
        //             $options = [
        //                 ['label' => 'A', 'text' => 'Option 1', 'is_correct' => true],
        //                 ['label' => 'B', 'text' => 'Option 2', 'is_correct' => false],
        //                 ['label' => 'C', 'text' => 'Option 3', 'is_correct' => false],
        //                 ['label' => 'D', 'text' => 'Option 4', 'is_correct' => false],
        //             ];
        //     }

        //     foreach ($options as $opt) {
        //         Option::create([
        //             'question_id' => $question->id,
        //             'label' => $opt['label'],
        //             'text' => $opt['text'],
        //             'is_correct' => $opt['is_correct'],
        //         ]);
        //     }
        // }

        
        $now = Carbon::now();

        // Helper: find question ID by its question_text
        $getId = fn($text) => DB::table('questions')
            ->where('question_text', $text)
            ->value('id');

        $data = [
            // 🌍 Geography
            'What is the capital city of France?' => [
                ['A', 'Paris', true],
                ['B', 'Lyon', false],
                ['C', 'Marseille', false],
                ['D', 'Nice', false],
            ],
            'Which country has the longest coastline in the world?' => [
                ['A', 'Australia', false],
                ['B', 'Russia', false],
                ['C', 'Canada', true],
                ['D', 'Indonesia', false],
            ],
            'Mount Kilimanjaro is located in which country?' => [
                ['A', 'Kenya', false],
                ['B', 'Tanzania', true],
                ['C', 'Ethiopia', false],
                ['D', 'Uganda', false],
            ],
            'Which city is the capital of Australia?' => [
                ['A', 'Sydney', false],
                ['B', 'Melbourne', false],
                ['C', 'Canberra', true],
                ['D', 'Perth', false],
            ],
            'What is the capital of Canada?' => [
                ['A', 'Toronto', false],
                ['B', 'Vancouver', false],
                ['C', 'Ottawa', true],
                ['D', 'Montreal', false],
            ],
            'Which African country has Abuja as its capital?' => [
                ['A', 'Ghana', false],
                ['B', 'Nigeria', true],
                ['C', 'Cameroon', false],
                ['D', 'Kenya', false],
            ],
            'What is the capital city of Brazil?' => [
                ['A', 'Rio de Janeiro', false],
                ['B', 'São Paulo', false],
                ['C', 'Brasília', true],
                ['D', 'Salvador', false],
            ],

            // 🧪 Science
            'What is the chemical symbol for gold?' => [
                ['A', 'Gd', false],
                ['B', 'Au', true],
                ['C', 'Ag', false],
                ['D', 'Pt', false],
            ],
            'How many bones are in the adult human body?' => [
                ['A', '206', true],
                ['B', '210', false],
                ['C', '201', false],
                ['D', '208', false],
            ],
            'Which planet has the most moons?' => [
                ['A', 'Jupiter', true],
                ['B', 'Saturn', false],
                ['C', 'Uranus', false],
                ['D', 'Neptune', false],
            ],
            'What planet is known as the Red Planet?' => [
                ['A', 'Venus', false],
                ['B', 'Mars', true],
                ['C', 'Mercury', false],
                ['D', 'Jupiter', false],
            ],
            'What gas do humans need to breathe in order to survive?' => [
                ['A', 'Oxygen', true],
                ['B', 'Carbon Dioxide', false],
                ['C', 'Nitrogen', false],
                ['D', 'Hydrogen', false],
            ],
            'What is H₂O commonly known as?' => [
                ['A', 'Water', true],
                ['B', 'Hydrogen Peroxide', false],
                ['C', 'Salt', false],
                ['D', 'Alcohol', false],
            ],
            'What part of the plant conducts photosynthesis?' => [
                ['A', 'Roots', false],
                ['B', 'Leaves', true],
                ['C', 'Stem', false],
                ['D', 'Flower', false],
            ],
            'How many planets are there in our solar system?' => [
                ['A', '7', false],
                ['B', '8', true],
                ['C', '9', false],
                ['D', '10', false],
            ],

            // 🏛️ History
            'Which ancient city was buried under volcanic ash after the eruption of Mount Vesuvius in 79 AD?' => [
                ['A', 'Pompeii', true],
                ['B', 'Athens', false],
                ['C', 'Rome', false],
                ['D', 'Troy', false],
            ],
            'The Code of Hammurabi was a set of laws from which ancient civilization?' => [
                ['A', 'Egyptian', false],
                ['B', 'Babylonian', true],
                ['C', 'Greek', false],
                ['D', 'Persian', false],
            ],
            'Who was the famous Carthaginian general who crossed the Alps to fight Rome?' => [
                ['A', 'Hannibal', true],
                ['B', 'Scipio', false],
                ['C', 'Caesar', false],
                ['D', 'Alexander', false],
            ],
            'The Great Library of Alexandria was located in which ancient empire?' => [
                ['A', 'Greek', false],
                ['B', 'Roman', false],
                ['C', 'Egyptian', true],
                ['D', 'Persian', false],
            ],
            'Which ancient civilization built Machu Picchu?' => [
                ['A', 'Aztec', false],
                ['B', 'Mayan', false],
                ['C', 'Incan', true],
                ['D', 'Olmec', false],
            ],

            // 🎬 Movies
            'Who directed the movie "Inception"?' => [
                ['A', 'Steven Spielberg', false],
                ['B', 'Christopher Nolan', true],
                ['C', 'James Cameron', false],
                ['D', 'Ridley Scott', false],
            ],
            'In which year was the first "Harry Potter" movie released?' => [
                ['A', '2000', false],
                ['B', '2001', true],
                ['C', '2002', false],
                ['D', '1999', false],
            ],
            '“May the Force be with you.” — From which movie is this iconic quote?' => [
                ['A', 'Star Wars', true],
                ['B', 'Star Trek', false],
                ['C', 'Avatar', false],
                ['D', 'Guardians of the Galaxy', false],
            ],
            '“I’m the king of the world!” — Which blockbuster features this line?' => [
                ['A', 'Titanic', true],
                ['B', 'Gladiator', false],
                ['C', 'Avatar', false],
                ['D', 'The Lion King', false],
            ],
            '“Here’s looking at you, kid.” — This quote is from which classic film?' => [
                ['A', 'Casablanca', true],
                ['B', 'Gone with the Wind', false],
                ['C', 'Citizen Kane', false],
                ['D', 'The Godfather', false],
            ],
            '“Why so serious?” — Who delivers this chilling line?' => [
                ['A', 'Joker (Heath Ledger)', true],
                ['B', 'Batman', false],
                ['C', 'Two-Face', false],
                ['D', 'Bane', false],
            ],
            '“You can’t handle the truth!” — Which courtroom drama features this quote?' => [
                ['A', 'A Few Good Men', true],
                ['B', 'The Firm', false],
                ['C', '12 Angry Men', false],
                ['D', 'The Verdict', false],
            ],

            // ⚽ Sports
            'How many players are on a soccer team on the field?' => [
                ['A', '9', false],
                ['B', '10', false],
                ['C', '11', true],
                ['D', '12', false],
            ],
            'Which country won the FIFA World Cup in 2018?' => [
                ['A', 'Brazil', false],
                ['B', 'France', true],
                ['C', 'Germany', false],
                ['D', 'Argentina', false],
            ],
            'In basketball, how many points is a shot made from beyond the arc worth?' => [
                ['A', '2 points', false],
                ['B', '3 points', true],
                ['C', '4 points', false],
                ['D', '1 point', false],
            ],
            'Who has won the most Grand Slam titles in men’s tennis history?' => [
                ['A', 'Roger Federer', false],
                ['B', 'Rafael Nadal', false],
                ['C', 'Novak Djokovic', true],
                ['D', 'Pete Sampras', false],
            ],
            'Which athlete is known as “The Fastest Man Alive”?' => [
                ['A', 'Usain Bolt', true],
                ['B', 'Carl Lewis', false],
                ['C', 'Michael Johnson', false],
                ['D', 'Tyson Gay', false],
            ],
            'In baseball, how many players are on the field for one team during play?' => [
                ['A', '7', false],
                ['B', '8', false],
                ['C', '9', true],
                ['D', '10', false],
            ],
        ];

        foreach ($data as $questionText => $options) {
            $questionId = $getId($questionText);
            if (!$questionId) continue;

            foreach ($options as [$label, $text, $isCorrect]) {
                DB::table('options')->insert([
                    'question_id' => $questionId,
                    'label' => $label,
                    'text' => $text,
                    'is_correct' => $isCorrect,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        $this->command->info('OptionSeeder completed successfully!');
    }
}
