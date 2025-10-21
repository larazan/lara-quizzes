<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
            ['name' => 'Geography', 'slug' => 'geography'],
            ['name' => 'Science', 'slug' => 'science'],
            ['name' => 'History', 'slug' => 'history'],
            ['name' => 'Movies', 'slug' => 'movies'],
            ['name' => 'Sports', 'slug' => 'sports'],
        ]);
    }
}
