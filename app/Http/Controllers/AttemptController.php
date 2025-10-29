<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Attempt;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AttemptController extends Controller
{
    //
    public function start(Quiz $quiz)
    {
        $attempt = Attempt::create([
            'quiz_id' => $quiz->id,
            'user_id' => auth()->id(),
            'started_at' => now(),
            'max_score' => $quiz->questions()->count(),
        ]);
        return redirect()->route('quizzes.show', $quiz)->with('attemptId', $attempt->id);
    }

    public function answer(Attempt $attempt, Request $request)
    {
        $this->authorize('update', $attempt); // optional policy
        $data = $request->validate([
            'question_id' => ['required','exists:questions,id'],
            'option_id'   => ['nullable','exists:options,id'],
        ]);

        Answer::updateOrCreate(
            ['attempt_id'=>$attempt->id,'question_id'=>$data['question_id']],
            ['option_id'=>$data['option_id']]
        );

        return response()->json(['ok'=>true]);
    }

    public function submit(Attempt $attempt)
    {
        $this->authorize('update', $attempt);

        $attempt->load('quiz.questions.options', 'answers');
        $answersByQ = $attempt->answers->keyBy('question_id');

        $score = 0;
        foreach ($attempt->quiz->questions as $q) {
            $chosen = $answersByQ[$q->id]->option_id ?? null;
            $correct = $q->options->firstWhere('is_correct', true)?->id;
            if ($chosen && $chosen === $correct) $score++;
        }

        $attempt->update([
            'score' => $score,
            'submitted_at' => now(),
        ]);

        return redirect()->route('quizzes.show', $attempt->quiz_id)
            ->with('result', ['score'=>$score, 'max'=>$attempt->max_score]);
    }
}
