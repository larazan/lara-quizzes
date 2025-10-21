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
        $quizzes = Quiz::all();
        $questions = Question::all();

        if ($quizzes->isEmpty() || $questions->isEmpty()) {
            $this->command->warn('No quizzes or questions found — please seed them first.');
            return;
        }

        foreach ($quizzes as $quiz) {
            // Randomly pick between 5 and 10 questions per quiz
            $selectedQuestions = $questions->random(min(10, $questions->count()));

            $order = 1;
            foreach ($selectedQuestions as $question) {
                DB::table('quiz_questions')->insert([
                    'quiz_id' => $quiz->id,
                    'question_id' => $question->id,
                    'order' => $order++,
                ]);
            }
        }

        $this->command->info('QuizQuestionSeeder completed successfully!');
    }
}
