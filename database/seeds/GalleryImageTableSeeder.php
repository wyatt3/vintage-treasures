<?php

use Illuminate\Database\Seeder;
use App\GalleryImage;

class GalleryImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=9; $i++) {
            $img = new GalleryImage([
                'imageName' => strval($i) . '.jpg'
            ]);
            $img->save();
        }
    }
}
