<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BaseSeeder extends Seeder
{
    protected $disk;

    protected $dir;

    protected $demo_dir;

    public function __construct()
    {
        $dir  = image_storage_dir();

        if( ! Storage::exists($dir) ) {
            Storage::makeDirectory($dir, 0755, true, true);
        }

        $this->dir = image_storage_dir();

        $this->demo_dir = public_path('images/demo');

        $this->disk = Storage::disk(config('filesystems.default'));
    }

}