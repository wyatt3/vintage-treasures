<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(HoursTableSeeder::class);
        $this->call(BlogPostTableSeeder::class);
        $this->call(GalleryImageTableSeeder::class);
    }
}
