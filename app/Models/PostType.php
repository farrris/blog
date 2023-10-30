<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostType extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "icon"
    ];

    const TEXT = 1;
    const QUOTE = 2;
    const IMAGE = 3;
    const VIDEO = 4;
    const LINK = 5;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
