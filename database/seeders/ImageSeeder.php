<?php

namespace Database\Seeders;

use App\Enums\noImagePath;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            "logo" => noImagePath::PATH,
            "favicon" => noImagePath::PATH,
        ]);
    }
}
