<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

protected $fillable = [
    "title",
    "content",
    "quote_author",
    "image",
    "video",
    "link",
    "views",
    "user_id",
    "post_type_id"
];
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postType(): BelongsTo
    {
        return $this->belongsTo(PostType::class);
    }

    
}
