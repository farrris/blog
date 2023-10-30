<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService {

    public function upload(UploadedFile $file): string
    {
        $filename = $file->hashName();
        $file->store();

        return Storage::url($filename);
    }

    public function uploadFromExternalResource($url): string
    {   
        $filename = basename($url);
        $contents = file_get_contents($url);
        Storage::disk(config("filesystem.default"))->put($filename, $contents);

        return Storage::url($filename);
    }

}