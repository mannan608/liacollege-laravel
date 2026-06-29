<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait HandlesFiles
{
    public function uploadFile(
        UploadedFile $file,
        string $directory,
        ?string $filename = null
    ): string {

        $name = $filename
            ? $filename . '.' . $file->getClientOriginalExtension()
            : Str::ulid() . '.' . $file->getClientOriginalExtension();

        $uploadPath = public_path('uploads/' . $directory);

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $file->move($uploadPath, $name);

        return 'uploads/' . $directory . '/' . $name;
    }

    public function deleteFile(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        $fullPath = public_path($path);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
            return true;
        }

        return false;
    }

    public function replaceFile(
        ?UploadedFile $newFile,
        ?string $oldPath,
        string $directory
    ): ?string {

        if (!$newFile) {
            return $oldPath;
        }

        $this->deleteFile($oldPath);

        return $this->uploadFile(
            $newFile,
            $directory
        );
    }

    public function fileUrl(
        ?string $path,
        ?string $fallback = null
    ): ?string {

        return $path
            ? asset($path)
            : $fallback;
    }
}


// <?php

// namespace App\Traits;

// use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

// trait HandlesFiles
// {
//     public function uploadFile(
//         UploadedFile $file,
//         string $directory,
//         string $disk = 'public',
//         ?string $filename = null
//     ): string {

//         $name = $filename
//             ? $filename.'.'.$file->extension()
//             : Str::ulid().'.'.$file->extension();

//         return $file->storeAs(
//             $directory,
//             $name,
//             $disk
//         );
//     }

//     public function uploadFiles(
//         array $files,
//         string $directory,
//         string $disk = 'public'
//     ): array {

//         $paths = [];

//         foreach ($files as $file) {

//             if (!$file instanceof UploadedFile) {
//                 continue;
//             }

//             $paths[] = $this->uploadFile(
//                 $file,
//                 $directory,
//                 $disk
//             );
//         }

//         return $paths;
//     }

//     public function deleteFile(
//         ?string $path,
//         string $disk = 'public'
//     ): bool {

//         return $path
//             ? Storage::disk($disk)->delete($path)
//             : false;
//     }

//     public function deleteFiles(
//         array $paths,
//         string $disk = 'public'
//     ): void {

//         foreach ($paths as $path) {
//             $this->deleteFile($path, $disk);
//         }
//     }

//     public function replaceFile(
//         ?UploadedFile $newFile,
//         ?string $oldPath,
//         string $directory,
//         string $disk = 'public'
//     ): ?string {

//         if (!$newFile) {
//             return $oldPath;
//         }

//         $this->deleteFile($oldPath, $disk);

//         return $this->uploadFile(
//             $newFile,
//             $directory,
//             $disk
//         );
//     }

//     public function fileUrl(
//         ?string $path,
//         string $disk = 'public',
//         ?string $fallback = null
//     ): ?string {

//         return $path
//             ? Storage::disk($disk)->url($path)
//             : $fallback;
//     }
// }
