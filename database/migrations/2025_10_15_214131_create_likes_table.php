<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Make user_id nullable
            $table->string('ip_address', 45)->nullable(); // IPv6 can be longer
            $table->text('user_agent')->nullable(); // Store the full user agent string
            $table->morphs('likeable');
            $table->timestamps();

            // Add unique constraints for both logged-in and guest likes
            // A logged-in user can like an item once
            $table->unique(['user_id', 'likeable_id', 'likeable_type'])->whereNotNull('user_id');
            // A guest (IP + User-Agent) can like an item once
            $table->unique(['ip_address', 'user_agent', 'likeable_id', 'likeable_type'])->whereNull('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
