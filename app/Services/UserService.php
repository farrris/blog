<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;

class UserService {

    public function __construct(private FileService $fileService)
    {
        
    }

    public function createUser(array $registrationData, $avatarFile): User
    {   
        if ($avatarFile) $registrationData["avatar"] = $this->fileService->upload($avatarFile);
        $user = User::create($registrationData);

        return $user;
    }

}