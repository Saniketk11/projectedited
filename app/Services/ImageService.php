<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * @param array $files
     * @param string $path
     * @param Project $project
     * @return void
     */
    public static function saveImages(?array $files, string $path, Project$project): void
    {
        if ($files) {

            $data = [];
            $disk = Storage::disk('public');

            foreach ($files as $file) {
                $image = [];
                $image['mime'] = $file->getClientOriginalExtension();
                $image['name'] = $fileName = time() . rand(1, 999999999) . '.' . $image['mime'];
                $image['path'] = $path . '/' . $image['name'];
                $filePath = '/' . $image['path'];

                $disk->put($filePath, file_get_contents($file), 'public');

                $data[] = [
                  'file_name' => $filePath
                ];
            }


            $project->$path()->createMany($data);
        }
    }
}
