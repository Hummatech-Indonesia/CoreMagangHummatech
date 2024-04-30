<?php

namespace Database\Seeders;

use Artisan;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemoveImage extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->deleteDirectoryContents('public');
        $this->recreateDirectory('public');

        // Delete the storage directory if it exists
        $storagePath = public_path('storage');
        if (File::isDirectory($storagePath)) {
            File::deleteDirectory($storagePath);
        }

        // Recreate the symbolic link
        Artisan::call('storage:link --force');
    }

    /**
     * Recursively delete files and folders in a directory.
     *
     * @param string $directory
     */
    protected function deleteDirectoryContents(string $directory): void
    {
        Storage::deleteDirectory($directory);
    }

    /**
     * Recreate folder public
     *
     * @param string $directory
     */
    protected function recreateDirectory(string $directory): void
    {
        Storage::createDirectory($directory);
    }
}

