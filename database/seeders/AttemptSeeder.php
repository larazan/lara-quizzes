<?php

namespace Database\Seeders;

use App\Models\Attempt;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $quizzes = Quiz::all();
        $users   = User::all();

        if ($quizzes->isEmpty()) {
            $this->command->warn('No quizzes found — please seed quizzes first.');
            return;
        }

        $now = Carbon::now();

        foreach ($quizzes as $quiz) {
            // ----- 1️⃣  Create attempts for registered users -----
            foreach ($users as $user) {
                $maxScore = rand(5, 10);
                $score    = rand(0, $maxScore);

                Attempt::create([
                    'quiz_id'      => $quiz->id,
                    'user_id'      => $user->id,
                    'guest_token'  => null,
                    'score'        => $score,
                    'max_score'    => $maxScore,
                    'started_at'   => $now->copy()->subDays(rand(5, 20))->addMinutes(rand(1, 20)),
                    'submitted_at' => $now->copy()->subDays(rand(1, 4)),
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ]);
            }

            // ----- 2️⃣  Create attempts for guests -----
            $guestCount = rand(3, 6);
            for ($i = 0; $i < $guestCount; $i++) {
                $guestToken = Str::uuid();
                $maxScore   = rand(5, 10);
                $score      = rand(0, $maxScore);

                Attempt::create([
                    'quiz_id'      => $quiz->id,
                    'user_id'      => null,
                    'guest_token'  => $guestToken,
                    'score'        => $score,
                    'max_score'    => $maxScore,
                    'started_at'   => $now->copy()->subDays(rand(5, 15))->addMinutes(rand(10, 60)),
                    'submitted_at' => $now->copy()->subDays(rand(1, 3)),
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ]);
            }
        }

        $this->command->info('AttemptSeeder completed successfully!');
    }
}
