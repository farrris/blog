<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\ImageStoreRequest;
use App\Http\Requests\Post\LinkStoreRequest;
use App\Http\Requests\Post\QuoteStoreRequest;
use App\Http\Requests\Post\TextStoreRequest;
use App\Http\Requests\Post\VideoStoreRequest;
use App\Models\PostType;
use App\Services\HashTagService;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{   

    public function __construct(private PostService $postService)
    {
        
    }

    public function create(): View
    {
        return view("adding-post");
    }

    public function storeImage(ImageStoreRequest $request): RedirectResponse
    {   
        $requestData = $request->validated(); 

        $this->postService->createImagePost($requestData, $request->file("image_file"));

        return redirect()->to("/");
    }

    public function storeVideo(VideoStoreRequest $request): RedirectResponse
    {
        $post = $this->postService->createPostWithoutImage($request->validated(), PostType::VIDEO);

        return redirect()->to("/");
    }

    public function storeText(TextStoreRequest $request): RedirectResponse
    {
        $post = $this->postService->createPostWithoutImage($request->validated(), PostType::TEXT);

        return redirect()->to("/");
    }

    public function storeQuote(QuoteStoreRequest $request): RedirectResponse
    {
        $post = $this->postService->createPostWithoutImage($request->validated(), PostType::QUOTE);

        return redirect()->to("/");
    }

    public function storeLink(LinkStoreRequest $request): RedirectResponse
    {
        $post = $this->postService->createPostWithoutImage($request->validated(), PostType::LINK);

        return redirect()->to("/");
    }
}
