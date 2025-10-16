<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Report;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    //
    public function store(Request $r) {
        $r->validate([
          'reportable_type' => 'required|string|in:quiz,quiz_answer',
          'reportable_id'   => 'required|integer',
          'reason'          => 'required|string|max:100',
          'message'         => 'nullable|string|max:1000',
        ]);
    
        $class = match($r->reportable_type) {
          'quiz' => \App\Models\Quiz::class,
          'quiz_answer' => \App\Models\QuizAnswer::class,
        };
    
        $guestToken = auth()->check() ? null : session('guestToken') ?? Str::uuid();
        if(!$guestToken && auth()->guest()) session(['guestToken'=>$guestToken]);
    
        $report = Report::create([
          'reportable_type' => $class,
          'reportable_id' => $r->reportable_id,
          'user_id' => auth()->id(),
          'guest_token' => $guestToken,
          'reason' => $r->reason,
          'message' => $r->message,
        ]);
    
        return back()->with('success','Report submitted for review.');
      }
    
      public function index() {
        $this->authorize('manage-quizzes');
        $reports = Report::with(['reportable','reporter'])->latest()->paginate(20);
        return inertia('Admin/Reports/Index',['reports'=>$reports]);
      }
    
    public function review(Request $r, Report $report) {
        $this->authorize('manage-quizzes');
        
        $report->update([
          'status' => $r->input('action','reviewed'),
          'reviewed_by' => auth()->id(),
          'reviewed_at' => now(),
        ]);
        
        return back();
    }
}
