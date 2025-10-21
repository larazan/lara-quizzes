<?php

namespace Database\Seeders;

use App\Models\Attempt;
use App\Models\QuizQuestion;
use App\Models\Option;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $attempts = Attempt::all();

        if ($attempts->isEmpty()) {
            $this->command->warn('No attempts found — please seed attempts first.');
            return;
        }

        $this->command->info('Seeding answers for ' . $attempts->count() . ' attempts...');

        foreach ($attempts as $attempt) {
            // Get questions linked to this quiz
            $quizQuestions = DB::table('quiz_questions')
                ->where('quiz_id', $attempt->quiz_id)
                ->pluck('question_id');

            if ($quizQuestions->isEmpty()) continue;

            foreach ($quizQuestions as $questionId) {
                // Get all options for this question
                $options = Option::where('question_id', $questionId)->get();
                if ($options->isEmpty()) continue;

                // Randomly pick an option — 70% chance to pick correct
                $isCorrectChoice = rand(1, 100) <= 70;
                if ($isCorrectChoice) {
                    $option = $options->where('is_correct', true)->first();
                } else {
                    $option = $options->where('is_correct', false)->random();
                }

                Answer::create([
                    'attempt_id'  => $attempt->id,
                    'question_id' => $questionId,
                    'option_id'   => $option?->id,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        $this->command->info('AnswerSeeder completed successfully!');
    }
}
