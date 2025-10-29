<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug; // Import HasSlug
use Spatie\Sluggable\SlugOptions; // Import SlugOptions

class Quiz extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'description',
        'image_path',
        'difficulty',
        'time_limit_seconds',
        'display_mode',
        'is_published',
        'is_approved',
        'is_private',
    ];

     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') // Generate slug from the 'name' attribute (translatable)
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate(); // Optional: only generate on creation
    }
    
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('desc', 'like', '%' . request('search') . '%');
            });
        }

        if ($filters['user_id'] ?? false) {
            $query->where('user_id', request('user_id'));
        }

        if($filters['cat'] ?? false) {
            $query->where('category_id', request('cat'));
        }

        if($filters['diff'] ?? false) {
            $query->where('difficulty', request('diff'));
        }
    }

    // public function questions() { 
    //     return $this->hasMany(Question::class)->orderBy('order'); 
    // }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_questions')
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

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function ratings() {
        return $this->hasMany(QuizRating::class);
    }
    
    public function averageRating() {
        return round($this->ratings()->avg('rating'), 2);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
