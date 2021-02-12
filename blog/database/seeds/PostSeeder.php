<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class,10)->create();
        
        $tags = App\Tag::all();

            App\Post::all()->each(function ($post) use ($tags) { 
                $post->tags()->attach(
                    $tags->random(1,3)->pluck('id')->toArray()
                ); 
            });
    }
}
