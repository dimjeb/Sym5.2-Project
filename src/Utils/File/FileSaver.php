<?php

namespace App\Utils\File;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileSaver
{
    public function __construct()
    {

    }

    public function saveUploadedFileIntoTemp(UploadedFile $uploadedFile)
    {
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        dd($originalFilename);
    }
}