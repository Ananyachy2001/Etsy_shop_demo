<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateVersion extends Command
{
    protected $signature = 'update:version';
    protected $description = 'Update the version.txt file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Path to the version.txt file
        $filePath = base_path('version.txt');

        // Read the current version from the file
        $currentVersion = file_get_contents($filePath);

        // Split the version into major, minor, and patch parts
        list($major, $minor, $patch) = explode('.', $currentVersion);

        // Logic to increment the version
        if ($patch < 9) {
            $patch++;
        } elseif ($minor < 9) {
            $minor++;
            $patch = 0;
        } else {
            $major++;
            $minor = 0;
            $patch = 0;
        }

        // Create the new version string
        $newVersion = "$major.$minor.$patch";

        // Update the file with the new version
        file_put_contents($filePath, $newVersion);

        $this->info('Version updated to ' . $newVersion);
    }

}
