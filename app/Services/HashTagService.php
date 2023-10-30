<?php

namespace App\Services;

use App\Models\HashTag;
use App\Models\HashTagPost;

class HashTagService {

    public function createHashTagsOnPost(int $postId, string $hashTagsInputString)
    {
        $hashTagsInputArray = explode(", ", $hashTagsInputString);

        foreach ($hashTagsInputArray as $hashTagInput) {

            $hashTag = HashTag::firstOrCreate(["title" => $hashTagInput]);

            HashTagPost::create([
                "post_id" => $postId,
                "hash_tag_id" => $hashTag->id
            ]);
        }
    }

}