<?php

namespace App\Services;

use Illuminate\Support\Str;
use \Exception;

class UploadFileService
{
    /**
     * @param string $dir
     * @param $files
     * @return array
     * @throws Exception
     */
    public function uploadFile(string $dir, $files): array
    {
        try {
            $filenames = [];
            foreach ($files as $file)
            {
                $filename = Str::random(32).'.'.$file->getClientOriginalExtension();
                $file->move($dir, $filename);
                $filenames[] = $filename;
            }

            return $filenames;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}