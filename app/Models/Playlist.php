<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_public', 'user_id', 'slug', 'uuid'];

    protected static function booted()
    {
        static::creating(function ($playlist) {
            $playlist->uuid = Str::uuid();
            $playlist->slug = Str::slug($playlist->title) . '-' . Str::random(6);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class)
                    ->withPivot('order')
                    ->orderBy('playlist_quiz.order');
    }
}
