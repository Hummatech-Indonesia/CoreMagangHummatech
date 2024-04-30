<?php

namespace Database\Seeders;

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

