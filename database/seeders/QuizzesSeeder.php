<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = Category::all();

        $quizzes = [
            [
                'title' => 'World Capitals Challenge',
                'description' => 'Test your knowledge of world capitals in this geography quiz!',
                'category_id' => $categories->where('slug', 'geography')->first()->id ?? null,
                'type_id' => 2,
                'difficulty' => 'medium',
                'image_path' => 'quiz_images/world_capitals.jpg',
                'time_limit_seconds' => 180,
                'is_published' => true,
                'is_approved' => true,
                'user_id' => 1,
            ],
            [
                'title' => 'Basic Science Facts',
                'description' => 'Can you answer these easy science questions? Perfect for beginners.',
                'category_id' => $categories->where('slug', 'science')->first()->id ?? null,
                'type_id' => 2,
                'difficulty' => 'easy',
                'image_path' => 'quiz_images/basic_science.jpg',
                'time_limit_seconds' => null,
                'is_published' => true,
                'is_approved' => true,
                'user_id' => 1,
            ],
            [
                'title' => 'Ancient History Quiz',
                'description' => 'Explore civilizations, battles, and empires from the ancient world.',
                'category_id' => $categories->where('slug', 'history')->first()->id ?? null,
                'type_id' => 2,
                'difficulty' => 'hard',
                'image_path' => 'quiz_images/ancient_history.jpg',
                'time_limit_seconds' => 300,
                'is_published' => true,
                'is_approved' => false, // still pending admin review
                'user_id' => 1,
            ],
            [
                'title' => 'Famous Movie Quotes',
                'description' => 'Can you guess which movies these iconic lines come from?',
                'category_id' => $categories->where('slug', 'movies')->first()->id ?? null,
                'type_id' => 2,
                'difficulty' => 'medium',
                'image_path' => 'quiz_images/movie_quotes.jpg',
                'time_limit_seconds' => 240,
                'is_published' => true,
                'is_approved' => true,
                'user_id' => 1,
            ],
            [
                'title' => 'Sports Trivia Marathon',
                'description' => 'From football to basketball, test your all-around sports knowledge.',
                'category_id' => $categories->where('slug', 'sports')->first()->id ?? null,
                'type_id' => 2,
                'difficulty' => 'medium',
                'image_path' => 'quiz_images/sports_trivia.jpg',
                'time_limit_seconds' => 180,
                'is_published' => false,
                'is_approved' => false,
                'user_id' => 1,
            ],
        ];

        foreach ($quizzes as $quizData) {
            Quiz::create($quizData);
        }
    }
}
