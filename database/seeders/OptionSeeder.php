<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $questions = Question::all();

        if ($questions->isEmpty()) {
            $this->command->warn('No questions found — please seed questions first.');
            return;
        }

        foreach ($questions as $question) {
            switch (true) {
                case str_contains(strtolower($question->question_text), 'capital'):
                    $options = [
                        ['label' => 'A', 'text' => 'Paris', 'is_correct' => true],
                        ['label' => 'B', 'text' => 'London', 'is_correct' => false],
                        ['label' => 'C', 'text' => 'Berlin', 'is_correct' => false],
                        ['label' => 'D', 'text' => 'Madrid', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'coastline'):
                    $options = [
                        ['label' => 'A', 'text' => 'Russia', 'is_correct' => false],
                        ['label' => 'B', 'text' => 'Canada', 'is_correct' => true],
                        ['label' => 'C', 'text' => 'Australia', 'is_correct' => false],
                        ['label' => 'D', 'text' => 'Indonesia', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'kilimanjaro'):
                    $options = [
                        ['label' => 'A', 'text' => 'Kenya', 'is_correct' => false],
                        ['label' => 'B', 'text' => 'Uganda', 'is_correct' => false],
                        ['label' => 'C', 'text' => 'Tanzania', 'is_correct' => true],
                        ['label' => 'D', 'text' => 'Ethiopia', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'gold'):
                    $options = [
                        ['label' => 'A', 'text' => 'Ag', 'is_correct' => false],
                        ['label' => 'B', 'text' => 'Go', 'is_correct' => false],
                        ['label' => 'C', 'text' => 'Au', 'is_correct' => true],
                        ['label' => 'D', 'text' => 'Gd', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'bones'):
                    $options = [
                        ['label' => 'A', 'text' => '198', 'is_correct' => false],
                        ['label' => 'B', 'text' => '206', 'is_correct' => true],
                        ['label' => 'C', 'text' => '210', 'is_correct' => false],
                        ['label' => 'D', 'text' => '215', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'moons'):
                    $options = [
                        ['label' => 'A', 'text' => 'Earth', 'is_correct' => false],
                        ['label' => 'B', 'text' => 'Jupiter', 'is_correct' => true],
                        ['label' => 'C', 'text' => 'Mars', 'is_correct' => false],
                        ['label' => 'D', 'text' => 'Saturn', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'inception'):
                    $options = [
                        ['label' => 'A', 'text' => 'Christopher Nolan', 'is_correct' => true],
                        ['label' => 'B', 'text' => 'James Cameron', 'is_correct' => false],
                        ['label' => 'C', 'text' => 'Steven Spielberg', 'is_correct' => false],
                        ['label' => 'D', 'text' => 'Ridley Scott', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'harry potter'):
                    $options = [
                        ['label' => 'A', 'text' => '1999', 'is_correct' => false],
                        ['label' => 'B', 'text' => '2001', 'is_correct' => true],
                        ['label' => 'C', 'text' => '2003', 'is_correct' => false],
                        ['label' => 'D', 'text' => '2005', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'soccer'):
                    $options = [
                        ['label' => 'A', 'text' => '9', 'is_correct' => false],
                        ['label' => 'B', 'text' => '10', 'is_correct' => false],
                        ['label' => 'C', 'text' => '11', 'is_correct' => true],
                        ['label' => 'D', 'text' => '12', 'is_correct' => false],
                    ];
                    break;

                case str_contains(strtolower($question->question_text), 'world cup'):
                    $options = [
                        ['label' => 'A', 'text' => 'Germany', 'is_correct' => false],
                        ['label' => 'B', 'text' => 'France', 'is_correct' => true],
                        ['label' => 'C', 'text' => 'Brazil', 'is_correct' => false],
                        ['label' => 'D', 'text' => 'Argentina', 'is_correct' => false],
                    ];
                    break;

                default:
                    // generic fallback
                    $options = [
                        ['label' => 'A', 'text' => 'Option 1', 'is_correct' => true],
                        ['label' => 'B', 'text' => 'Option 2', 'is_correct' => false],
                        ['label' => 'C', 'text' => 'Option 3', 'is_correct' => false],
                        ['label' => 'D', 'text' => 'Option 4', 'is_correct' => false],
                    ];
            }

            foreach ($options as $opt) {
                Option::create([
                    'question_id' => $question->id,
                    'label' => $opt['label'],
                    'text' => $opt['text'],
                    'is_correct' => $opt['is_correct'],
                ]);
            }
        }

        $this->command->info('OptionSeeder completed successfully!');
    }
}
