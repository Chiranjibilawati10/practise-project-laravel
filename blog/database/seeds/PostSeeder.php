<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Category;

class PostSeeder extends Seeder
{
    private $postData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id = Category::first()->value('id');

         for ($i=0; $i <100; $i++){
            $postData[] = [
            'title' => 'Title 1',
            'body' => Str::random(10),
            'slug' => Str::random(10),
            'category_id' => $category_id,
            ];
        }

        foreach ($postData as $posts) {
            Post::create($posts);
        }
       
    }
}
