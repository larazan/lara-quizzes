<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image_path',
        'difficulty',
        'time_limit_seconds',
        'is_published',
        'is_approved',
        'created_by'
    ];
    
    // public function questions() { 
    //     return $this->hasMany(Question::class)->orderBy('order'); 
    // }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_question')
            ->withPivot('order')
            ->orderBy('order');
    }
    
    public function attempts() { 
        return $this->hasMany(Attempt::class); 
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings() {
        return $this->hasMany(QuizRating::class);
    }
    
    public function averageRating() {
        return round($this->ratings()->avg('rating'), 2);
    }
}
