<?php

use App\Models\HashTag;
use App\Models\Post;
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
        Schema::create('hash_tag_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HashTag::class)->constrained();
            $table->foreignIdFor(Post::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hash_tag_posts');
    }
};
