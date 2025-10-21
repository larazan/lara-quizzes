<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'quiz_id',
        'question_text',
        'image_path',
        'order',
        'difficulty',
        'created_by'
    ];
    
    public function quiz() { 
        return $this->belongsTo(Quiz::class); 
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_question')
            ->withPivot('order')
            ->withTimestamps();
    }
    
    public function options() { 
        return $this->hasMany(Option::class); 
    }

}
