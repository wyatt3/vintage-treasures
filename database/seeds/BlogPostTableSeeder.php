<?php

use Illuminate\Database\Seeder;
use App\BlogPost;

class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new BlogPost([
            'imgName' => 'test.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus volutpat odio ac pretium. Suspendisse et imperdiet urna. Sed facilisis porta purus eget varius.',
        ]);
        $post->save();
        $post = new BlogPost([
            'imgName' => 'test.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus volutpat odio ac pretium. Suspendisse et imperdiet urna. Sed facilisis porta purus eget varius.',
        ]);
        $post->save();
        $post = new BlogPost([
            'imgName' => 'test.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus volutpat odio ac pretium. Suspendisse et imperdiet urna. Sed facilisis porta purus eget varius.',
        ]);
        $post->save();
        $post = new BlogPost([
            'imgName' => 'test.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus volutpat odio ac pretium. Suspendisse et imperdiet urna. Sed facilisis porta purus eget varius.',
        ]);
        $post->save();
    }
}
