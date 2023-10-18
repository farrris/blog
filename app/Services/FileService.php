<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService {

    public function upload(UploadedFile $file): string
    {
        $filename = $file->hashName();
        $file->store();

        return Storage::url($filename);
    }

}