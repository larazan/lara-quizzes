<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\NotSuspended;

class QuizController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware(
                ['auth', 'verified', NotSuspended::class],
                except: ['index', 'show']
            )
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $quizzes = Quiz::whereHas('user', function (Builder $query) {
            $query->where('role', '!=', 'suspended');
        })
            ->with('user', 'category')
            ->withCount('questions')
            // ->where('approved', true)
            ->filter(request(['search', 'user_id', 'cat', 'diff']))
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return Inertia::render('QuizList', [
            'quizzes' => $quizzes,
            'searchTerm' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quiz = Quiz::whereHas('user', function (Builder $query) {
            $query->where('role', '!=', 'suspended');
        })
            ->with('user', 'category')
            ->withCount('questions')
            ->where('id', $id)
            ->firstOrFail();

        return Inertia::render('Quiz/Show', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
