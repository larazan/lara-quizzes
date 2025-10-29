<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Type::insert([
            ['name' => 'Classic', 'slug' => 'classic'],
            ['name' => 'Multiple Choice', 'slug' => 'multiple-choice'],
            ['name' => 'Clickable', 'slug' => 'clickable'],
            ['name' => 'True False', 'slug' => 'true-false'],
        ]);
    }
}
