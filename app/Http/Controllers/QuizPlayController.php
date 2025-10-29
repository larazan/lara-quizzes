<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Attempt;
use App\Models\Answer;
use App\Models\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;


class QuizPlayController extends Controller
{
    //
    /**
     * Start quiz attempt (for both guests and users)
     */
    public function start(Request $request, Quiz $quiz)
    {
        $user = $request->user();
        $guestToken = $request->cookie('guest_token') ?? Str::uuid();

        // Start attempt (reuse if not submitted yet)
        $attempt = Attempt::firstOrCreate(
            [
                'quiz_id' => $quiz->id,
                'user_id' => $user?->id,
                'guest_token' => $user ? null : $guestToken,
                'submitted_at' => null,
            ],
            [
                'started_at' => now(),
                'max_score' => $quiz->questions()->count(),
            ]
        );

        // Set guest cookie
        if (! $user) {
            cookie()->queue('guest_token', $guestToken, 60 * 24 * 7); // valid for 7 days
        }

        return inertia('Quiz/Play', [
            'quiz' => $quiz->load(['questions.options']),
            'attempt' => $attempt,
        ]);
    }

    /**
     * Save single question answer (for one-by-one mode)
     */
    public function saveAnswer(Request $request)
    {
        $data = $request->validate([
            'attempt_id' => 'required|exists:attempts,id',
            'question_id' => 'required|exists:questions,id',
            'option_id' => 'nullable|exists:options,id',
        ]);

        Answer::updateOrCreate(
            [
                'attempt_id' => $data['attempt_id'],
                'question_id' => $data['question_id'],
            ],
            [
                'option_id' => $data['option_id'],
                'updated_at' => now(),
            ]
        );

        return response()->json(['status' => 'saved']);
    }

    /**
     * Submit full quiz (for both display modes)
     */
    public function submit(Request $request)
    {
        $data = $request->validate([
            'attempt_id' => 'required|exists:attempts,id',
            'answers' => 'required|array',
        ]);

        $attempt = Attempt::findOrFail($data['attempt_id']);

        DB::transaction(function () use ($data, $attempt) {
            foreach ($data['answers'] as $questionId => $optionId) {
                Answer::updateOrCreate(
                    [
                        'attempt_id' => $attempt->id,
                        'question_id' => $questionId,
                    ],
                    [
                        'option_id' => $optionId,
                    ]
                );
            }

            // Calculate score
            $correctCount = Answer::query()
                ->join('options', 'answers.option_id', '=', 'options.id')
                ->where('answers.attempt_id', $attempt->id)
                ->where('options.is_correct', true)
                ->count();

            $total = Answer::where('attempt_id', $attempt->id)->count();

            $attempt->update([
                'score' => $correctCount,
                'max_score' => $total,
                'submitted_at' => now(),
            ]);
        });

        return redirect()
            ->route('quiz.results', $attempt->id)
            ->with('success', 'Quiz submitted successfully!');
    }

    /**
     * Show results view
     */
    public function results(Attempt $attempt)
    {
        $attempt->load([
            'quiz.questions.options',
            'answers.option',
        ]);

        return inertia('Quiz/Results', [
            'attempt' => $attempt,
            'quiz' => $attempt->quiz,
        ]);
    }
}
