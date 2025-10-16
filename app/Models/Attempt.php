<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'user_id',
        'score',
        'max_score',
        'started_at',
        'submitted_at'
    ];

    protected $casts = [
        'started_at'=>'datetime',
        'submitted_at'=>'datetime'
    ];
    
    public function quiz() { 
        return $this->belongsTo(Quiz::class); 
    }
    
    public function user() { 
        return $this->belongsTo(User::class); 
    }
    
    public function answers() { 
        return $this->hasMany(Answer::class); 
    }
}
