<?php

namespace App\Services;

use App\Models\Post;
use App\Models\PostType;
use Illuminate\Support\Facades\Auth;

class PostService {

    public function __construct(private FileService $fileService,
                                private HashTagService $hashTagService)
    {
        
    }

    public function createImagePost(array $requestPostData, $imageFile)
    {   
        $image = ($imageFile) ?
        $this->fileService->upload($imageFile) :
        $this->fileService->uploadFromExternalResource($requestPostData["image_link"]);

        $post = Post::create([
            "title" => $requestPostData["title"],
            "image" => $image,
            "post_type_id" => PostType::IMAGE,
            "user_id" => Auth::id()
        ]);

        $this->hashTagService->createHashTagsOnPost($post->id, $requestPostData["hash_tags"]);

        return $post;
    }

    public function createPostWithoutImage(array $postData, $post_type_id)
    {
        $relationArray = [
            "post_type_id" => $post_type_id,
            "user_id" => Auth::id()
        ];

        $post = Post::create(
            array_merge($postData, $relationArray)
        );

        $this->hashTagService->createHashTagsOnPost($post->id, $postData["hash_tags"]);

        return $post;
    }

}