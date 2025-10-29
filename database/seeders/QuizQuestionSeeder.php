<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $quizzes = Quiz::all();
        // $questions = Question::all();

        // if ($quizzes->isEmpty() || $questions->isEmpty()) {
        //     $this->command->warn('No quizzes or questions found — please seed them first.');
        //     return;
        // }

        // foreach ($quizzes as $quiz) {
        //     // Randomly pick between 5 and 10 questions per quiz
        //     $selectedQuestions = $questions->random(min(10, $questions->count()));

        //     $order = 1;
        //     foreach ($selectedQuestions as $question) {
        //         DB::table('quiz_questions')->insert([
        //             'quiz_id' => $quiz->id,
        //             'question_id' => $question->id,
        //             'order' => $order++,
        //         ]);
        //     }
        // }

        $questions = [
            // 🌍 Geography
            ['quiz_id' => 1, 'question_id' => 1, 'order' => 1],
            ['quiz_id' => 1, 'question_id' => 2, 'order' => 2],
            ['quiz_id' => 1, 'question_id' => 3, 'order' => 3],
            ['quiz_id' => 1, 'question_id' => 4, 'order' => 4],
            ['quiz_id' => 1, 'question_id' => 5, 'order' => 5],
            ['quiz_id' => 1, 'question_id' => 6, 'order' => 6],
            ['quiz_id' => 1, 'question_id' => 7, 'order' => 7],
            ['quiz_id' => 1, 'question_id' => 8, 'order' => 8],
            // 🧪 Science
            ['quiz_id' => 2, 'question_id' => 9, 'order' => 1],
            ['quiz_id' => 2, 'question_id' => 10, 'order' => 2],
            ['quiz_id' => 2, 'question_id' => 11, 'order' => 3],
            ['quiz_id' => 2, 'question_id' => 12, 'order' => 4],
            ['quiz_id' => 2, 'question_id' => 13, 'order' => 5],
            ['quiz_id' => 2, 'question_id' => 14, 'order' => 6],
            ['quiz_id' => 2, 'question_id' => 15, 'order' => 7],
            ['quiz_id' => 2, 'question_id' => 16, 'order' => 8],
            // 
            ['quiz_id' => 3, 'question_id' => 17, 'order' => 1],
            ['quiz_id' => 3, 'question_id' => 18, 'order' => 2],
            ['quiz_id' => 3, 'question_id' => 19, 'order' => 3],
            ['quiz_id' => 3, 'question_id' => 20, 'order' => 4],
            ['quiz_id' => 3, 'question_id' => 21, 'order' => 5],
            // 🎬 Movies
            ['quiz_id' => 4, 'question_id' => 22, 'order' => 1],
            ['quiz_id' => 4, 'question_id' => 23, 'order' => 2],
            ['quiz_id' => 4, 'question_id' => 24, 'order' => 3],
            ['quiz_id' => 4, 'question_id' => 25, 'order' => 4],
            ['quiz_id' => 4, 'question_id' => 26, 'order' => 5],
            ['quiz_id' => 4, 'question_id' => 27, 'order' => 6],
            ['quiz_id' => 4, 'question_id' => 28, 'order' => 7],
            // ⚽ Sports
            ['quiz_id' => 5, 'question_id' => 29, 'order' => 1],
            ['quiz_id' => 5, 'question_id' => 30, 'order' => 2],
            ['quiz_id' => 5, 'question_id' => 31, 'order' => 3],
            ['quiz_id' => 5, 'question_id' => 32, 'order' => 4],
            ['quiz_id' => 5, 'question_id' => 33, 'order' => 5],
            ['quiz_id' => 5, 'question_id' => 34, 'order' => 6],
            ['quiz_id' => 5, 'question_id' => 35, 'order' => 7],
        ];

        DB::table('quiz_questions')->insert($questions);

        $this->command->info('QuizQuestionSeeder completed successfully!');
    }
}
